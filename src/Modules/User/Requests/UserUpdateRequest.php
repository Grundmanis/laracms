<?php

namespace Grundmanis\Laracms\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=1500,max_height=1500',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ];
    }
}
