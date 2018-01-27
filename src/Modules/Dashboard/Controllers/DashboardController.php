<?php

namespace Grundweb\Laracms\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('laracms::pages.dashboard');
    }
}
