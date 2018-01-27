<?php

namespace Grundweb\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index()
    {
        return view('laracms::pages.content.index');
    }

    public function edit()
    {
        return view('laracms::pages.content.edit');
    }
}