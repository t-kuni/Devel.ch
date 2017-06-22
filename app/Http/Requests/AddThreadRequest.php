<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddThreadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'    => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'between:5,20'],
            'text'     => ['required', 'string', 'max:1000'],
            'image'    => ['file', 'image', 'max:2048'],
            'g-recaptcha-response' => ['required', 'recaptcha'],
        ];
    }
}
