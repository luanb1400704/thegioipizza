<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanLyGiaBanhRequest extends FormRequest
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
            'b_ten' => 'required',
            'l_ten' => 'required',
            'g_tien' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'b_ten.required' => 'Tên bánh không được trống !',
            'l_ten.required' => 'Tên loại bánh không được trống !',
            'g_tien.required' => 'Vui lòng nhập kích thước bánh !',
            'g_tien.numeric' => 'Giá bánh phải là số !',
        ];
    }
}
