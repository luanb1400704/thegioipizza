<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class Customer extends FormRequest
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
    public static function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:users,phone|numeric|min:010000000|max:09999999999',
            'password' => 'required'
        ];
    }
    /**
     * @return array
     */
    public static function getMessage()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã bị trùng',
            'phone.min' => 'Số điện thoại nhỏ hơn 9 số',
            'phone.max' => 'Số điện thoại lớn hơn 11 số',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}