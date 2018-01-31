<?php

namespace Grundmanis\Laracms\Modules\Pages\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Pages\Models\LaracmsPage;
use Grundmanis\Laracms\Modules\Pages\Requests\PageRequest;

class ShowPageController extends Controller
{
    /**
     * @var LaracmsPage
     */
    private $page;

    /**
     * PagesController constructor.
     * @param LaracmsPage $page
     */
    public function __construct(LaracmsPage $page)
    {
        $this->page = $page;
    }

    /**
     * @param string $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function url(string $url)
    {
        $page = $this->page->where('url', $url)->first();
        return view('laracms.pages.index', compact('page'));
    }
}