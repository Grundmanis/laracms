<?php

namespace Grundweb\Laracms\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('laracms.dashboard::dashboard');
    }
}
