<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemKhachHangRequests extends FormRequest
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
            'phone' => 'required|unique:users|min:10|max:11|numeric',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khách hàng không được trống !',
            'phone.required' => 'Số điện thoại không được trống !',
            'phone.unique' => 'Số điện thoại đã có người đăng ký !',
            'phone.min' => 'Số điện thoại it nhất là 10 số !',
            'phone.max' => 'Số điện thoại nhiều nhất là 11 số !',
            'phone.numeric' => 'Số điện thoại phải là số !',
            'password.required' => 'Mật khẩu không được trống !',
            'password.min' => 'Mật khẩu thấp nhất là 6 ký tự !',
        ];
    }
}
