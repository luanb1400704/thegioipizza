<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanLyLoaiBanhRequest extends FormRequest
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
            'l_ten' => 'required',
            'l_kichthuoc' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'l_ten.required' => 'Tên loại bánh không được trống !',
            'l_kichthuoc.required' => 'Vui lòng nhập kích thước bánh !',
        ];
    }
}
