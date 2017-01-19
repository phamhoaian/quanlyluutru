<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StayingRequest;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\CustomerRepository;
use App\Repositories\Eloquents\HotelCustomerRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Eloquents\OwnerRepository;
use Auth;
use Carbon\Carbon;
use File;
use App\Http\Requests\SettingRequest;

class PagesController extends Controller
{
	protected $hotelRepository;
	protected $customerRepository;
	protected $hotelCustomRepository;
	protected $userRepository;
	protected $ownerRepository;

	public function __construct(HotelRepository $hotelRepository, CustomerRepository $customerRepository, HotelCustomerRepository $hotelCustomRepository, UserRepository $userRepository, OwnerRepository $ownerRepository)
	{
		$this->hotelRepository = $hotelRepository;
		$this->customerRepository = $customerRepository;
		$this->hotelCustomRepository = $hotelCustomRepository;
		$this->userRepository = $userRepository;
		$this->ownerRepository = $ownerRepository;
	}

    public function index()
    {
        return view('pages.top');
    }

    public function getVisitors(Request $request)
    {
        if($request->ajax())
        {
            $visitors = $this->hotelCustomRepository->findVisitorsByHotelId(Auth::user()->hotel_id, $request->type);

            if ($visitors)
            {
                return response()->json(array('type' => $request->type, 'visitors' => $visitors), 200);
            }
            else
            {
                return response()->json(array('error' => 'Not found'), 404);
            }
        }
        return FALSE;
    }

    public function showStayingForm()
    {
    	$list_year = array();
    	$current = Carbon::now();
    	$current_year = $current->year;
    	$current_date = $current->format('d-m-Y');
        for ($i = 1950; $i <= $current_year; $i++) { 
        	$list_year[$i] = $i;
        }
    	return view('pages.staying', compact('list_year', 'current_date'));
    }

    public function stayingForm(StayingRequest $request)
    {
    	// prepare data for customer
    	$input_customer['name'] = $request->name;
    	$input_customer['year_of_birth'] = $request->year_of_birth;
    	$input_customer['id_card'] = $request->id_card;
    	$input_customer['address'] = $request->address;
    	$input_customer['sex'] = $request->sex;

    	$customer = $this->customerRepository->findByField('id_card', $request->id_card)->first();

    	if ( ! $customer) // case of the customer not exist
    	{
    		$customer = $this->customerRepository->create($input_customer);
    	}

    	// prepare data for hotel custom
    	$input_hotel_customer['hotel_id'] = Auth::user()->hotel_id;
    	$input_hotel_customer['customer_id'] = $customer->id;
    	$input_hotel_customer['room_number'] = $request->room_number;

    	// check date start, date end
    	$date_start = Carbon::now()->format('Y-m-d');
    	$date_end = Carbon::parse($request->date_end)->format('Y-m-d');
    	if ($date_end < $date_start)
    	{
    		$date_end = $date_start;
    	}

    	// check check in, check out
    	$check_in = $request->check_in;
    	$check_out = $request->check_out;
    	if (($check_out < $check_in) && ($date_start == $date_end))
    	{
    		$check_out = $check_in;
    	}
    	$input_hotel_customer['check_in'] = $date_start.' '.$check_in.':00';
    	$input_hotel_customer['check_out'] = $date_end.' '.$check_out.':00';
    	$hotel_customer = $this->hotelCustomRepository->create($input_hotel_customer);

    	return redirect()->route('pages.staying')->with(['flash_level' => 'success', 'flash_message' => 'Đã khai báo khách lưu trú !']);
    }

    public function showSettingForm()
    {
    	$hotel = $this->hotelRepository->with('owner')->where('id', '=', Auth::user()->hotel_id)->first();
    	return view('pages.setting', compact('hotel'));
    }

    public function settingForm(SettingRequest $request)
    {
    	$hotel = $this->hotelRepository->with('owner', 'user')->where('id', '=', Auth::user()->hotel_id)->first();
        
        // update hotel information
        $input_hotel['name']      = $request->hotel_name;
        $input_hotel['address']   = $request->hotel_address;
        $input_hotel['phone']     = $request->hotel_phone;
        $input_hotel['room']      = $request->hotel_room;
        $input_hotel['type']      = $request->hotel_type;

        $current_photo_path = 'public/uploads/hotel/'.$request->current_photo;
        if ($request->hasFile('hotel_photo'))
        {
            $file_name = time() . '.'. $request->file('hotel_photo')->getClientOriginalExtension();
            $input_hotel['photo'] = $file_name;
            $request->file('hotel_photo')->move('public/uploads/hotel', $file_name);
            if (File::exists($current_photo_path))
            {
                File::delete($current_photo_path);
            }
        }
        $this->hotelRepository->update($input_hotel, $hotel->id);

        // update user's email
        $input_user['email'] = $request->hotel_email;
        $this->userRepository->update($input_user, $hotel->user->id);

        // update owner information
        $input_owner['name']			= $request->owner_name;
        $input_owner['birthday']		= Carbon::parse($request->owner_birthday)->format('Y-m-d');
        $input_owner['id_card']			= $request->owner_id_card;
        $input_owner['address']			= $request->owner_address;
        $input_owner['business_cert']	= $request->owner_business_cert;
        $input_owner['security']		= $request->owner_security;

        $this->ownerRepository->update($input_owner, $hotel->owner->id);

        return redirect()->route('pages.setting')->with(['flash_level' => 'success', 'flash_message' => 'Đã cập nhật thông tin !']);
    }
}
