<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;

/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function gioithieu()
    {
        return view('frontend.pages.gioithieu');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function quangcao()
    {
        return view('frontend.pages.quangcao');
    }
}
