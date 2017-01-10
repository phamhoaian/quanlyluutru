<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\OwnerRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Http\Requests\HotelRequest;

class HotelController extends Controller
{
    protected $hotelRepository;
    protected $ownerRepository;
    protected $userRepository;

    public function __construct(HotelRepository $hotelRepository, OwnerRepository $ownerRepository, UserRepository $userRepository)
    {
    	$this->hotelRepository = $hotelRepository;
    	$this->ownerRepository = $ownerRepository;
    	$this->userRepository  = $userRepository;
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

    	// get hotel id
		$user['hotel_id'] 	= $hotel->id;
		$user['email']		= $request->email;
		$tmp_password       = str_random(10);
        $user['password']  	= bcrypt($tmp_password);

		// make user automatically
		$user = $this->userRepository->create($user);

    	return redirect()->route('admin.hotel.list')->with(['flash_level' => 'success', 'flash_message' => 'Đã thêm nhà nghỉ/khách sạn mới !']);
    }

    public function showHotelFormEdit($id)
    {
    	$hotel = $this->hotelRepository->find($id);
    	return view('admin.hotel.edit', compact('hotel'));
    }
}
