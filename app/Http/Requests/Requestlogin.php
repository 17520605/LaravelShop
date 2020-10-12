<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      =>'required',
            'password'  =>'required'
        ];
    }
    public function messages()
    {
        return[
            'name.required'     =>'Trường này bạn không thể để trống',
            'password.unique'   =>'Trường này bạn không thể để trống'
        ];
    }
}
