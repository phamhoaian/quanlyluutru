<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
		$rules = [
			'name'          => 'required',
			'year_of_birth' => 'required|integer',
			'sex'           => 'required|integer',
			'room_number'   => 'required',
			'date_start'    => 'required',
			'date_end'      => 'required',
			'check_in'      => 'required',
			'check_out'     => 'required'
		];
		if ( ! Request::input('foreign_flg'))
		{
			$rules['id_card'] = 'required|numeric';
			$rules['address'] = 'required';
		}
		else
		{
			$rules['nationality'] 		= 'required';
			$rules['passport'] 			= 'required';
			$rules['passport_info'] 	= 'required';
			$rules['date_entry'] 		= 'required';
			$rules['port_entry'] 		= 'required';
			$rules['purpose_entry'] 	= 'required';
			$rules['permitted_start']	= 'required';
			$rules['permitted_end'] 	= 'required';
		}

		return $rules;
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
			'nationality.required'		=> 'Quốc tịch không được bỏ trống',
			'passport.required'			=> 'Số hộ chiếu không được bỏ trống',
			'passport_info.required'	=> 'Thông tin hộ chiếu không được bỏ trống',
			'date_entry.required'		=> 'Ngày nhập cảnh không được bỏ trống',
			'port_entry.required'		=> 'Cửa khẩu nhập cảnh  không được bỏ trống',
			'purpose_entry.required'	=> 'Mục đích nhập cảnh không được bỏ trống',
			'permitted_start.required'	=> 'Ngày bắt đầu không được bỏ trống',
			'permitted_end.required'	=> 'Ngày kết thúc không được bỏ trống',
		];
	}
}
