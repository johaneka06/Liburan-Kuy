<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Profile extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'Alamat email',
            'first' => 'Nama depan',
            'last' => 'Nama belakang',
            'phone' => 'Nomor HP'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first' => 'required',
            'last' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ];
    }
}
