<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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

    public function rules()
    {
        return [
            'password_old'                      =>  'required',
            'password'                          =>  'required',
            'password_new_confirm'              =>  'required|same:password',
        ];
    }
    public function messages()
    {
        return[
            'password_old.required'              =>'Trường này bạn không thể để trống',
            'password_new.required'              =>'Tên danh mục đã tồn tại',
            'password_new_confirm.required'      =>'Tên danh mục đã tồn tại',
            'password_new_confirm.same'           =>'Mật khẩu không khớp',
        ];
    }
}
