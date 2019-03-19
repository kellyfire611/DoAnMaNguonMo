<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DiaDiem;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $diadiems = DiaDiem::take(3)->get();
        $topmonans = DiaDiem::all();

        return view('frontend.index')
            ->with('diadiems', $diadiems)
            ->with('topmonans', $topmonans);
    }
}
