<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhanCapRequest extends FormRequest
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
            'pc_ten' => 'required',
            'pc_socap' => 'required|numeric',
            'pc_tile' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'pc_ten.required' => 'Tên phân cấp không được trống !',
            'pc_socap.required' => 'Vui lòng nhập số cấp !',
            'pc_socap.numeric' => 'Số phân cấp là số !',
            'pc_tile.required' => 'Vui lòng nhập số % !',
            'pc_tile.numeric' => 'Tỉ lệ % phân cấp là số !',
        ];
    }
}
