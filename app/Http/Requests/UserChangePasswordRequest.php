<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
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
            'current_password'      => 'required',
            'new_password'          => 'required',
            'retype_new_password'   => 'required|same:new_password'
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
            'current_password.required'     => 'Mật khẩu hiện tại không được bỏ trống',
            'new_password.required'         => 'Mật khẩu mới không được bỏ trống',
            'retype_new_password.required'  => 'Mật khẩu xác nhận không được bỏ trống',
            'retype_new_password.same'      => 'Mật khẩu xác nhận không trùng khớp'
        ];
    }
}
