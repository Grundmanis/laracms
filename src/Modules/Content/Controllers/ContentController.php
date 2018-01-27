<?php

namespace Grundweb\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundweb\Laracms\Modules\Content\Models\LaracmsContent;
use Grundweb\Laracms\Modules\Content\Requests\ContentRequest;

class ContentController extends Controller
{

    /**
     * @var LaracmsContent
     */
    protected $content;

    /**
     * ContentController constructor.
     * @param LaracmsContent $content
     */
    public function __construct(LaracmsContent $content)
    {
        $this->content = $content;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contents = LaracmsContent::paginate(10);
        return view('laracms.content::index', compact('contents', 'test'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('laracms.content::form');
    }

    /**
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentRequest $request)
    {
        $this->content->create($request->all());
        return redirect()->route('laracms.content')->with('status', 'Content created!');
    }

    /**
     * @param LaracmsContent $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsContent $content)
    {
        return view('laracms.content::form', compact('content'));
    }

    /**
     * @param LaracmsContent $content
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsContent $content, ContentRequest $request)
    {
        $content->update($request->all());
        return back()->with('status', 'Content updated!');
    }
}