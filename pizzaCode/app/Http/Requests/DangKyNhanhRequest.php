<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyNhanhRequest extends FormRequest
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
        return
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|unique:users|min:10',
                'password' => 'required|min:6',
                'customer_address' => 'required',
                'customer_cmnd' => 'required|numeric|min:9',
            ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'Tên không được bỏ trống !',
                'email.required' => 'Email không được bỏ trống !',
                'email.email' => 'Không phải định dạng email !',
                'email.unique' => 'Email đã có người sử dụng !',
                'phone.required' => 'SĐT không được trống !',
                'phone.numeric' => 'SĐT phải là số !',
                'phone.unique' => 'SĐT đã có người sử dụng !',
                'phone.min' => 'SĐT tối thiểu 10 ký tự !',
                'password.required' => 'Mật khẩu không được trống !',
                'password.min' => 'SĐT tối thiểu 6 ký tự !',
                'customer_address.required' => 'Địa chỉ không được trống !',
                'customer_cmnd.required' => 'CMND không được trống !',
                'customer_cmnd.numeric' => 'CMND phải là số !',
                'customer_cmnd.min' => 'CMND tối thiểu 9 ký tự !',
            ];
    }
}
