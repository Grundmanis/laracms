<?php

namespace Grundmanis\Laracms\Modules\Pages\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PageRequest extends FormRequest
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
        $rules = [
            'url' => 'required'
        ];

        foreach(config('translatable.locales') as $locale)
        {
            $rules[$locale . '.text'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $fields = [];
        foreach(config('translatable.locales') as $locale)
        {
            $fields[$locale . '.text'] = $locale .' text';
        }

        return $fields;
    }
}
