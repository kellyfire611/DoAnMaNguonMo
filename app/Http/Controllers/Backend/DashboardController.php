<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DiaDiem;
use App\Models\TinhThanh;
use App\Models\Auth\User;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $baocao= [];
        $diadiems = DiaDiem::all();
        $baocao['diadiem_count'] = $diadiems->count();

        $baocao['dichvu_count'] = 0;
        foreach($diadiems as $key=>$value)
        {
            $baocao['dichvu_count'] += $value->dichvus->count();
        }

        $users = User::all();
        $baocao['user_count'] = $users->count();

        $tinhthanhs = TinhThanh::all();
        $baocao['tinhthanh_count'] = $tinhthanhs->count();

        return view('backend.dashboard')
            ->with('baocaodata', $baocao);
    }
}
