<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.dashboard::dashboard');
    }
}
