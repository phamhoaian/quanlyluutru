<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'hotel'     => 'required',
            'email'     => 'required|email|unique:users'
        ];
    }

    /**
     * Set the validation message error that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'hotel.required'    => 'Vui lòng chọn một nhà nghỉ/khách sạn',
            'email.required'    => 'Email không được bỏ trống',
            'email.email'       => 'Vui lòng nhập đúng địa chỉ email',
            'email.unique'      => 'Email này đã được đăng ký bởi tài khoản khác'
        ];
    }
}
