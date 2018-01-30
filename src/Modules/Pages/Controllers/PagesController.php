<?php

namespace Grundmanis\Laracms\Modules\Pages\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('laracms.pages::index');
    }

    public function create()
    {
        return view('laracms.pages::form');
    }
}