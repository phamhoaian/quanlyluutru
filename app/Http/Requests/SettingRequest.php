<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SettingRequest extends FormRequest
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
            'hotel_name'            => 'required',
            'hotel_address'         => 'required',
            'hotel_email'           => 'required|email|unique:users,email,'.Auth::id(),
            'hotel_phone'           => 'numeric',
            'hotel_room'            => 'numeric',
            'hotel_type'            => 'required|numeric',
            'owner_name'            => 'required',
            'owner_birthday'        => 'required',
            'owner_id_card'         => 'required|numeric',
            'owner_address'         => 'required',
            'owner_business_cert'   => 'required',
            'owner_security'        => 'required'
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
            'hotel_name.required'           => 'Tên nhà nghỉ / khách sạn không được bỏ trống',
            'hotel_address.required'        => 'Địa chỉ không được bỏ trống',                   
            'hotel_email.required'          => 'Email không được bỏ trống',
            'hotel_email.email'             => 'Vui lòng nhập đúng địa chỉ email',
            'hotel_email.unique'            => 'Email này đã được đăng ký',
            'hotel_phone.numeric'           => 'Vui lòng nhập số điện thoại chính xác',
            'hotel_room.numeric'            => 'Vui lòng nhập số lượng phòng chính xác',
            'hotel_type.required'           => 'Vui lòng chọn loại hình kinh doanh',
            'hotel_type.numeric'            => 'Chỉ cho phép nhập số',
            'owner_name.required'           => 'Họ và tên không được bỏ trống',
            'owner_birthday.required'       => 'Ngày tháng năm sinh không được bỏ trống',
            'owner_id_card.required'        => 'Số CMND không được bỏ trống',
            'owner_id_card.numeric'         => 'Chỉ cho phép nhập số',
            'owner_address.required'        => 'Hộ khẩu thường trú không được bỏ trống',
            'owner_business_cert.required'  => 'Số giấy chứng nhận đăng ký kinh doanh không được bỏ trống',
            'owner_security.required'       => 'Số giấy an ninh trật tự không được bỏ trống'
        ];
    }
}
