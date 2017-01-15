<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StayingRequest extends FormRequest
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
			'name'          => 'required',
			'year_of_birth' => 'required|integer',
			'id_card'       => 'required|numeric',
			'address'       => 'required',
			'sex'           => 'required|integer',
			'room_number'   => 'required',
			'date_start'    => 'required',
			'date_end'      => 'required',
			'check_in'      => 'required',
			'check_out'     => 'required'
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
			'name.required'             => 'Họ và tên không được bỏ trống',
			'year_of_birth.required'    => 'Vui lòng chọn năm sinh',
			'year_of_birth.integer'     => 'Chỉ cho phép nhập số',
			'id_card.required'          => 'Số CMND không được bỏ trống',
			'id_card.numeric'           => 'Chỉ cho phép nhập số',
			'address.required'          => 'Hộ khẩu thường trú không được bỏ trống',
			'sex.required'              => 'Vui lòng chọn giới tính',
			'sex.integer'				=> 'Chỉ cho phép nhập số',
			'room_number.required'      => 'Số phòng không được bỏ trống',
			'date_start.required'		=> 'Ngày vào không được bỏ trống',
			'date_end.required'			=> 'Ngày ra không được bỏ trống',
			'check_in.required'			=> 'Thời gian vào không được bỏ trống',
			'check_out.required'		=> 'Thời gian ra không được bỏ trống',
		];
	}
}
