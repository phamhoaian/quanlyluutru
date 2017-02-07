<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\OwnerRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Eloquents\NoticeRepository;
use App\Http\Requests\HotelRequest;
use Mail;
use Illuminate\Support\Facades\Input;

class HotelController extends Controller
{
    protected $hotelRepository;
    protected $ownerRepository;
    protected $userRepository;
    protected $noticeRepository;

    public function __construct(HotelRepository $hotelRepository, OwnerRepository $ownerRepository, UserRepository $userRepository, NoticeRepository $noticeRepository)
    {
    	$this->hotelRepository = $hotelRepository;
    	$this->ownerRepository = $ownerRepository;
    	$this->userRepository  = $userRepository;
        $this->noticeRepository = $noticeRepository;
    }

    public function showListHotels()
    {
    	$hotels = $this->hotelRepository->with('owner')->get();
    	return view('admin.hotel.list', compact('hotels'));
    }

    public function showHotelFormAdd()
    {
        return view('admin.hotel.add');
    }

    public function hotelFormAdd(HotelRequest $request)
    {
    	$input['name'] 		= $request->name;
    	$input['address']	= $request->address;
    	$input['phone'] 	= $request->phone;
    	$input['room'] 		= $request->room;
    	$input['type'] 		= $request->type;

    	if ($request->hasFile('photo'))
    	{
    		$file_name = time() . '.'. $request->file('photo')->getClientOriginalExtension();
			$input['photo'] = $file_name;
			$request->file('photo')->move('public/uploads/hotel', $file_name);
    	}

    	$hotel = $this->hotelRepository->create($input);

        $active_key = md5(rand().microtime());

    	// get hotel id
		$user['hotel_id'] 	= $hotel->id;
		$user['email']		= $request->email;
		$tmp_password       = str_random(6);
        $user['password']  	= bcrypt($tmp_password);
        $user['active_key'] = $active_key;
        $user['active_flg'] = 0;

		// make user automatically
		$user = $this->userRepository->create($user);

        // send email activation
        Mail::send('email.activation', ['email' => $request->email, 'password' => $tmp_password, 'active_key' => $active_key], function($message) {
            $message->to(Input::get('email'))
                ->subject('Kích hoạt tài khoản');
        });

        // make notice
        $notice['message'] = $request->name . ' đã được đăng ký.'; 
        $notice['url'] = route('admin.hotel.edit', $hotel->id);
        $notice['type'] = 2;
        $notice['read_flg'] = 0;

        $notice = $this->noticeRepository->create($notice);

    	return redirect()->route('admin.hotel.list')->with(['flash_level' => 'success', 'flash_message' => $request->name . '  đã được đăng ký !']);
    }

    public function showHotelFormEdit($id)
    {
        $hotel = $this->hotelRepository->with('owner', 'user')->where('id', '=', $id)->first();
    	return view('admin.hotel.edit', compact('hotel'));
    }

    public function hotelFormEdit(HotelRequest $request, $id)
    {
        $hotel = $this->hotelRepository->with('owner', 'user')->where('id', '=', $id)->first();
        
        $input['name']      = $request->name;
        $input['address']   = $request->address;
        $input['phone']     = $request->phone;
        $input['room']      = $request->room;
        $input['type']      = $request->type;

        $current_photo_path = 'public/uploads/hotel/'.$request->current_photo;
        if ($request->hasFile('photo'))
        {
            $file_name = time() . '.'. $request->file('photo')->getClientOriginalExtension();
            $input['photo'] = $file_name;
            $request->file('photo')->move('public/uploads/hotel', $file_name);
            if (File::exists($current_photo_path))
            {
                File::delete($current_photo_path);
            }
        }
        $this->hotelRepository->update($input, $id);

        // update user's email
        $user['email'] = $request->email;
        $this->userRepository->update($user, $hotel->user->id);

        return redirect()->route('admin.hotel.list')->with(['update' => TRUE, 'flash_level' => 'success', 'flash_message' => 'Đã cập nhật thông tin !']);
    }
}
