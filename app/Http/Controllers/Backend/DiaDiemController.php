<?php

namespace App\Http\Controllers\Backend;

use App\Models\DiaDiem;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\DiaDiemRepository;
use App\Http\Requests\Backend\DiaDiem\StoreDiaDiemRequest;
use App\Http\Requests\Backend\DiaDiem\ManageDiaDiemRequest;
use App\Http\Requests\Backend\DiaDiem\UpdateDiaDiemRequest;

/**
 * Class DiaDiemController.
 */
class DiaDiemController extends Controller
{
    /**
     * @var DiaDiemRepository
     */
    protected $DiaDiemRepository;

    /**
     * DiaDiemController constructor.
     *
     * @param DiaDiemRepository $DiaDiemRepository
     */
    public function __construct(DiaDiemRepository $DiaDiemRepository)
    {
        $this->DiaDiemRepository = $DiaDiemRepository;
    }

    /**
     * @param ManageDiaDiemRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageDiaDiemRequest $request)
    {
        return view('backend.diaDiem.index')
            ->with('diadiems', $this->DiaDiemRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageDiaDiemRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageDiaDiemRequest $request)
    {
        return view('backend.diaDiem.create');
    }

    /**
     * @param StoreDiaDiemRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreDiaDiemRequest $request)
    {
        $this->DiaDiemRepository->create($request->only(
            'tendiadiem'
        ));

        return redirect()->route('admin.diadiem.index')->withFlashSuccess(__('alerts.backend.diadiem.created'));
    }

    /**
     * @param ManageDiaDiemRequest $request
     * @param DiaDiem              $DiaDiem
     *
     * @return mixed
     */
    public function show(ManageDiaDiemRequest $request, $_id)
    {
        $DiaDiem = DiaDiem::find($_id);
        return view('backend.diadiem.show')
            ->with('diadiem', $DiaDiem);
    }

    /**
     * @param ManageDiaDiemRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param DiaDiem                 $DiaDiem
     *
     * @return mixed
     */
    public function edit(ManageDiaDiemRequest $request, $_id)
    {
        $DiaDiem = DiaDiem::find($_id);
        return view('backend.diadiem.edit')
            ->with('diadiem', $DiaDiem);
    }

    /**
     * @param UpdateDiaDiemRequest $request
     * @param DiaDiem              $DiaDiem
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateDiaDiemRequest $request, $_id)
    {
        $DiaDiem = DiaDiem::find($_id);
        $this->DiaDiemRepository->update($DiaDiem, $request->only(
            'tendiadiem'
        ));

        return redirect()->route('admin.diadiem.index')->withFlashSuccess(__('alerts.backend.diadiem.updated'));
    }

    /**
     * @param ManageDiaDiemRequest $request
     * @param DiaDiem              $DiaDiem
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageDiaDiemRequest $request, $_id)
    {
        $this->DiaDiemRepository->deleteById($_id);

        return redirect()->route('admin.diadiem.index')->withFlashSuccess(__('alerts.backend.diadiem.deleted'));
    }
}
