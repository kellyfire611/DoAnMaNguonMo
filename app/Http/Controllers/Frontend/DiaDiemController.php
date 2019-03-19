<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Backend\DiaDiem\ManageDiaDiemRequest;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\DiaDiem;

/**
 * Class DiaDiemController.
 */
class DiaDiemController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        //dd($users);
        return view('frontend.diadiem.index')
            ->with('users', $users);
    }

    public function show(ManageDiaDiemRequest $request, $_id)
    {
        $DiaDiem = DiaDiem::find($_id);
        return view('frontend.diadiem.show')
            ->with('diadiem', $DiaDiem);
    }
}
