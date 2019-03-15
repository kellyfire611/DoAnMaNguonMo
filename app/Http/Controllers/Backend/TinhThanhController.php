<?php

namespace App\Http\Controllers\Backend;

use App\Models\TinhThanh;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\TinhThanhRepository;
use App\Http\Requests\Backend\TinhThanh\StoreTinhThanhRequest;
use App\Http\Requests\Backend\TinhThanh\ManageTinhThanhRequest;
use App\Http\Requests\Backend\TinhThanh\UpdateTinhThanhRequest;

/**
 * Class TinhThanhController.
 */
class TinhThanhController extends Controller
{
    /**
     * @var TinhThanhRepository
     */
    protected $TinhThanhRepository;

    /**
     * TinhThanhController constructor.
     *
     * @param TinhThanhRepository $TinhThanhRepository
     */
    public function __construct(TinhThanhRepository $TinhThanhRepository)
    {
        $this->TinhThanhRepository = $TinhThanhRepository;
    }

    /**
     * @param ManageTinhThanhRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageTinhThanhRequest $request)
    {
        return view('backend.tinhThanh.index')
            ->with('tinhthanhs', $this->TinhThanhRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageTinhThanhRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageTinhThanhRequest $request)
    {
        return view('backend.tinhThanh.create');
    }

    /**
     * @param StoreTinhThanhRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreTinhThanhRequest $request)
    {
        $this->TinhThanhRepository->create($request->only(
            'tentinhthanh'
        ));

        return redirect()->route('admin.tinhthanh.index')->withFlashSuccess(__('alerts.backend.tinhthanh.created'));
    }

    /**
     * @param ManageTinhThanhRequest $request
     * @param TinhThanh              $TinhThanh
     *
     * @return mixed
     */
    public function show(ManageTinhThanhRequest $request, TinhThanh $TinhThanh)
    {
        dd($TinhThanh);
        return view('backend.tinhthanh.show')
            ->with('tinhthanh', $TinhThanh);
    }

    /**
     * @param ManageTinhThanhRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param TinhThanh                 $TinhThanh
     *
     * @return mixed
     */
    public function edit(ManageTinhThanhRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, TinhThanh $TinhThanh)
    {
        return view('backend.tinhthanh.edit')
            ->withTinhThanh($TinhThanh)
            ->withRoles($roleRepository->get())
            ->withTinhThanhRoles($TinhThanh->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withTinhThanhPermissions($TinhThanh->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateTinhThanhRequest $request
     * @param TinhThanh              $TinhThanh
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateTinhThanhRequest $request, TinhThanh $TinhThanh)
    {
        $this->TinhThanhRepository->update($TinhThanh, $request->only(
            'tentinhthanh'
        ));

        return redirect()->route('admin.tinhthanh.index')->withFlashSuccess(__('alerts.backend.tinhthanh.updated'));
    }

    /**
     * @param ManageTinhThanhRequest $request
     * @param TinhThanh              $TinhThanh
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageTinhThanhRequest $request, TinhThanh $TinhThanh)
    {
        $this->TinhThanhRepository->deleteById($TinhThanh->id);

        event(new TinhThanhDeleted($TinhThanh));

        return redirect()->route('admin.tinhthanh.deleted')->withFlashSuccess(__('alerts.backend.tinhthanh.deleted'));
    }
}
