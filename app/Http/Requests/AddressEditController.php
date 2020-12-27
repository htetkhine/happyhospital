<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressEditController extends FormRequest
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
            'address' => 'required|min:4|max:255',
            'phone' => 'required|regex:/(09)[0-9]{9}/',
            'email' => 'required|unique:users,email' 
        ];
    }
}
