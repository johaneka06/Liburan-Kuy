<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'fName' => 'Nama depan',
            'lName' => 'Nama belakang',
            'nomorHp' => 'Nomor HP'
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
            'fName' => 'required',
            'lName' => 'required',
            'nomorHp' => 'required|numeric',
            'email' => 'required',
            'password' => 'required|alpha_num|min:8|max:64'
        ];
    }
}
