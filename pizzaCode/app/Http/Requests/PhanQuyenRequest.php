<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhanQuyenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pq_ten' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pq_ten.required' => 'Không được trống !',
        ];
    }
}
