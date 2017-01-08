<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'hotel' => 'required',
                    'email' => 'required|email|unique:users,email',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                if (Auth::user()->role_id == 1)
                {
                    return [
                        'hotel' => 'required',
                        'email' => 'required|email|unique:users,email,'.$this->id,
                    ];
                }
                else
                {
                    return [
                        'email' => 'required|email|unique:users,email,'.$this->id,
                    ];
                }
                
            }
            default:break;
        }
        
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
            'email.unique'      => 'Email này đã được đăng ký bởi tài khoản khác',
        ];
    }
}
