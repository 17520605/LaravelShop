<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name'                      =>'required|unique:products,pro_name,'.$this->id,
            'pro_category_id'               => 'required',
            'pro_price'                     => 'required',
            'pro_description'               => 'required',
            'pro_content'                   => 'required'
            
        ];
    }
    public function messages()
    {
        return[
            'pro_name.required'         =>'Trường này bạn không thể để trống',
            'pro_name.unique'           =>'Tên danh mục đã tồn tại',
            'pro_category_id.unique'    =>'Tên danh mục đã tồn tại',
            'pro_price.unique'          =>'Tên danh mục đã tồn tại',
            'pro_description.unique'    =>'Tên danh mục đã tồn tại',
            'pro_content.unique'        =>'Tên danh mục đã tồn tại'
        ];
    }
}
