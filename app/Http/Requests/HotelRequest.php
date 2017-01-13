<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Hotel;

class HotelRequest extends FormRequest
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
        $hotel = Hotel::with('user')->where('id', '=', $this->id)->first();
        
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
                    'name'      => 'required',
                    'address'   => 'required',
                    'email'     => 'required|email|unique:users,email',
                    'phone'     => 'numeric',
                    'room'      => 'numeric',
                    'type'      => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'      => 'required',
                    'address'   => 'required',
                    'email'     => 'required|email|unique:users,email,'.$hotel->user->id,
                    'phone'     => 'numeric',
                    'room'      => 'numeric',
                    'type'      => 'required'
                ];
                
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
            'name.required'     => 'Tên nhà nghỉ / khách sạn không được bỏ trống',
            'address.required'  => 'Địa chỉ không được bỏ trống',                   
            'email.required'    => 'Email không được bỏ trống',
            'email.email'       => 'Vui lòng nhập đúng địa chỉ email',
            'email.unique'      => 'Email này đã được đăng ký',
            'phone.numeric'     => 'Vui lòng nhập số điện thoại chính xác',
            'room.numeric'      => 'Vui lòng nhập số lượng phòng chính xác',
            'type.required'     => 'Vui lòng chọn loại hình kinh doanh'
        ];
    }
}
