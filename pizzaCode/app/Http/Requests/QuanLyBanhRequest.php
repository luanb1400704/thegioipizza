<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanLyBanhRequest extends FormRequest
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
            'b_mota' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'b_ten.required' => 'Tên bánh không được trống !',
            'b_mota.required' => 'Mô tả bánh !',
        ];
    }
}
