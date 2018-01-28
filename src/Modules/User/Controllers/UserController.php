<?php

namespace Grundweb\Laracms\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Grundweb\Laracms\Modules\User\Models\LaracmsUser;

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

    public function index()
    {
        $users = $this->user->paginate(15);
        return view('laracms.user::index', compact('users'));
    }
}
