<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiNhanhRequest extends FormRequest
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
                'phone' => 'required|unique:users|numeric',
                'password' => 'required',
                'ten_chinhanh' => 'required',
                'diachi_chinhanh' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'Tên chủ chi nhánh không được bỏ trống !',
                'email.required' => 'Email không được bỏ trống',
                'email.email' => 'Email chưa đúng định dạng',
                'email.unique' => 'Email này đăng ký rồi',
                'phone.required' => 'Số điện thoại không được bỏ trống',
                'phone.unique' => 'Số điện thoại này đăng ký rồi',
                'phone.numeric' => 'Số điện thoại không được là chữ',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'ten_chinhanh.required' => 'Tên chi nhánh không được bỏ trống',
                'diachi_chinhanh.required' => 'Địa chỉ chi nhánh không được bỏ trống',
            ];
    }
}
