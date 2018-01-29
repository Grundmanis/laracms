<?php

namespace Grundmanis\Laracms\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\Content\Models\LaracmsContent;
use Grundmanis\Laracms\Modules\Content\Requests\UserRequest;

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
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
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
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsContent $content, UserRequest $request)
    {
        $content->update($request->all());
        return back()->with('status', 'Content updated!');
    }

    /**
     * @param LaracmsContent $content
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsContent $content)
    {
        $content->delete();
        return redirect()->route('laracms.content')->with('status', 'Content deleted! Make sure to remove it from blade');
    }
}