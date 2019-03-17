<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;

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
}
