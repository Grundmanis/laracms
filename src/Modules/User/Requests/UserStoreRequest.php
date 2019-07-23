<?php

namespace Grundmanis\Laracms\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserStoreRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('laracms')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:laracms_users,email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=1500,max_height=1500',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ];
    }
}
