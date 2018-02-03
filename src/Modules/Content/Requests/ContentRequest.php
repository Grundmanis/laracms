<?php

namespace Grundmanis\Laracms\Modules\Content\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Locale;

class ContentRequest extends FormRequest
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
            'slug' => 'required'
        ];

        foreach(Locale::getLocales() as $locale)
        {
            $rules[$locale . '.value'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        $fields = [];
        foreach(Locale::getLocales() as $locale)
        {
            $fields[$locale . '.value'] = $locale .' value';
        }

        return $fields;
    }
}
