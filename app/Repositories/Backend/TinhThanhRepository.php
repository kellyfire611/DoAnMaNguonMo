<?php

namespace App\Repositories\Backend;

use App\Models\TinhThanh;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Notifications\Backend\Auth\TinhThanhAccountActive;
use App\Notifications\Frontend\Auth\TinhThanhNeedsConfirmation;

/**
 * Class TinhThanhRepository.
 */
class TinhThanhRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return TinhThanh::class;
    }

    /**
     * @return mixed
     */
    public function getUnconfirmedCount() : int
    {
        return $this->model
            ->where('confirmed', 0)
            ->count();
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->with('roles', 'permissions', 'providers')
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->with('roles', 'permissions', 'providers')
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return TinhThanh
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : TinhThanh
    {
        return DB::transaction(function () use ($data) {
            $TinhThanh = parent::create([
                'tentinhthanh' => $data['tentinhthanh'],
            ]);

            if ($TinhThanh) {
                return $TinhThanh;
            }

            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.create_error'));
        });
    }

    /**
     * @param TinhThanh  $TinhThanh
     * @param array $data
     *
     * @return TinhThanh
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(TinhThanh $TinhThanh, array $data) : TinhThanh
    {
        $this->checkTinhThanhByEmail($TinhThanh, $data['email']);

        // See if adding any additional permissions
        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            $data['permissions'] = [];
        }

        return DB::transaction(function () use ($TinhThanh, $data) {
            if ($TinhThanh->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
            ])) {
                // Add selected roles/permissions
                $TinhThanh->syncRoles($data['roles']);
                $TinhThanh->syncPermissions($data['permissions']);

                event(new TinhThanhUpdated($TinhThanh));

                return $TinhThanh;
            }

            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.update_error'));
        });
    }

    /**
     * @param TinhThanh $TinhThanh
     * @param      $input
     *
     * @return TinhThanh
     * @throws GeneralException
     */
    public function updatePassword(TinhThanh $TinhThanh, $input) : TinhThanh
    {
        if ($TinhThanh->update(['password' => $input['password']])) {
            event(new TinhThanhPasswordChanged($TinhThanh));

            return $TinhThanh;
        }

        throw new GeneralException(__('exceptions.backend.access.TinhThanhs.update_password_error'));
    }

    /**
     * @param TinhThanh $TinhThanh
     * @param      $status
     *
     * @return TinhThanh
     * @throws GeneralException
     */
    public function mark(TinhThanh $TinhThanh, $status) : TinhThanh
    {
        if (auth()->id() == $TinhThanh->id && $status == 0) {
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_deactivate_self'));
        }

        $TinhThanh->active = $status;

        switch ($status) {
            case 0:
                event(new TinhThanhDeactivated($TinhThanh));
            break;

            case 1:
                event(new TinhThanhReactivated($TinhThanh));
            break;
        }

        if ($TinhThanh->save()) {
            return $TinhThanh;
        }

        throw new GeneralException(__('exceptions.backend.access.TinhThanhs.mark_error'));
    }

    /**
     * @param TinhThanh $TinhThanh
     *
     * @return TinhThanh
     * @throws GeneralException
     */
    public function confirm(TinhThanh $TinhThanh) : TinhThanh
    {
        if ($TinhThanh->confirmed) {
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.already_confirmed'));
        }

        $TinhThanh->confirmed = 1;
        $confirmed = $TinhThanh->save();

        if ($confirmed) {
            event(new TinhThanhConfirmed($TinhThanh));

            // Let TinhThanh know their account was approved
            if (config('access.TinhThanhs.requires_approval')) {
                $TinhThanh->notify(new TinhThanhAccountActive);
            }

            return $TinhThanh;
        }

        throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_confirm'));
    }

    /**
     * @param TinhThanh $TinhThanh
     *
     * @return TinhThanh
     * @throws GeneralException
     */
    public function unconfirm(TinhThanh $TinhThanh) : TinhThanh
    {
        if (! $TinhThanh->confirmed) {
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.not_confirmed'));
        }

        if ($TinhThanh->id == 1) {
            // Cant un-confirm admin
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_unconfirm_admin'));
        }

        if ($TinhThanh->id == auth()->id()) {
            // Cant un-confirm self
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_unconfirm_self'));
        }

        $TinhThanh->confirmed = 0;
        $unconfirmed = $TinhThanh->save();

        if ($unconfirmed) {
            event(new TinhThanhUnconfirmed($TinhThanh));

            return $TinhThanh;
        }

        throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_unconfirm'));
    }

    /**
     * @param TinhThanh $TinhThanh
     *
     * @return TinhThanh
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(TinhThanh $TinhThanh) : TinhThanh
    {
        if (is_null($TinhThanh->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.delete_first'));
        }

        return DB::transaction(function () use ($TinhThanh) {
            // Delete associated relationships
            $TinhThanh->passwordHistories()->delete();
            $TinhThanh->providers()->delete();
            $TinhThanh->sessions()->delete();

            if ($TinhThanh->forceDelete()) {
                event(new TinhThanhPermanentlyDeleted($TinhThanh));

                return $TinhThanh;
            }

            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.delete_error'));
        });
    }

    /**
     * @param TinhThanh $TinhThanh
     *
     * @return TinhThanh
     * @throws GeneralException
     */
    public function restore(TinhThanh $TinhThanh) : TinhThanh
    {
        if (is_null($TinhThanh->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.TinhThanhs.cant_restore'));
        }

        if ($TinhThanh->restore()) {
            event(new TinhThanhRestored($TinhThanh));

            return $TinhThanh;
        }

        throw new GeneralException(__('exceptions.backend.access.TinhThanhs.restore_error'));
    }

    /**
     * @param TinhThanh $TinhThanh
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkTinhThanhByEmail(TinhThanh $TinhThanh, $email)
    {
        //Figure out if email is not the same
        if ($TinhThanh->email != $email) {
            //Check to see if email exists
            if ($this->model->where('email', '=', $email)->first()) {
                throw new GeneralException(trans('exceptions.backend.access.TinhThanhs.email_error'));
            }
        }
    }
}
