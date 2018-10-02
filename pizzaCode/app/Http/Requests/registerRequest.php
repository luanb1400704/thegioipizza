<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|unique:users|numeric',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống !',
            'phone.required' => 'SĐT không được trống !',
            'phone.numeric' => 'SĐT phải là số !',
            'phone.unique' => 'SĐT đã có người sử dụng !',
            'password.required' => 'Mật khẩu không được trống !',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự !',
        ];
    }
}
