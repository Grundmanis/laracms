<?php

namespace Grundmanis\Laracms\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Grundmanis\Laracms\Modules\User\Models\LaracmsUser;
use Grundmanis\Laracms\Modules\User\Requests\UserStoreRequest;
use Grundmanis\Laracms\Modules\User\Requests\UserUpdateRequest;

class LaracmsUserController extends Controller
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
        $view = view()->exists('laracms.users.index') ? 'laracms.users.index' : 'laracms.user::index';

        return view($view, compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $view = view()->exists('laracms.users.form') ? 'laracms.users.form' : 'laracms.user::form';

        return view($view);
    }

    /**
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        $data = [
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ];

        if ($request->avatar) {
            $data['avatar'] = $this->user->uploadAvatar(uniqid(), $request);
        }

        $this->user->create($data);

        return redirect()->route('laracms.users')->with('status', __('laracms::admin.user_created'));
    }

    /**
     * @param LaracmsUser $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LaracmsUser $user)
    {
        $view = view()->exists('laracms.users.form') ? 'laracms.users.form' : 'laracms.user::form';
        $edit = true;

        return view($view, compact('user', 'edit'));
    }

    /**
     * @param LaracmsUser $user
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LaracmsUser $user, UserUpdateRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
        ];

        // Password change
        if ($request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        // Avatar upload
        if ($request->avatar) {
            $data['avatar'] = $this->user->uploadAvatar($user->email, $request);
            $this->user->deleteAvatar();
        }

        $user->update($data);

        return redirect()->route('laracms.users')->with('status', __('laracms::admin.user_updated'));
    }

    /**
     * @param LaracmsUser $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(LaracmsUser $user)
    {
        $this->user->deleteAvatar();
        $user->delete();

        return back()->with('status', __('laracms::admin.user_deleted'));
    }
}
