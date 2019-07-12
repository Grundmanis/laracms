<?php

namespace Grundmanis\Laracms\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\User\Models\LaracmsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * @var LaracmsUser
     */
    protected $user;

    /**
     * UserProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('laracms.auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('laracms')->user();
            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('laracms.user::profile', [
            'user' => $this->user
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $this->user->name = $request->input('name');
        $this->user->save();

        return back()->with('status', 'Profile updated.');
    }
}
