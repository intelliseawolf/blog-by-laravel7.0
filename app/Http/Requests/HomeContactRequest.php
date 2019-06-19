<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeContactRequest extends FormRequest
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
            'name'      => 'required|max:255|string',
            'email'     => 'required|max:255|email',
            'subject'   => 'required|max:255|string',
            'message'   => 'required|max:500|string',
        ];
    }
}
