<?php

namespace Grundmanis\Laracms\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\User\Models\LaracmsUser;
use Grundmanis\Laracms\Modules\User\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var LaracmsUser
     */
    private $user;

    /**
     * UserController constructor.
     * @param LaracmsUser $user
     */
    public function __construct(LaracmsUser $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->paginate(15);
        return view('laracms.user::index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('laracms.user::form');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->user->create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('laracms.users')->with('status', 'User created!');
    }

    /**
     * @param LaracmsUser $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsUser $user)
    {
        return view('laracms.user::form', compact('user'));
    }

    /**
     * @param LaracmsUser $user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsUser $user, UserRequest $request)
    {
        $this->user->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ]);
        return back()->with('status', 'Profile updated.');
    }

    /**
     * @param LaracmsUser $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsUser $user)
    {
        $user->delete();
        return redirect()->back()->with('status', 'User deleted!');
    }
}
