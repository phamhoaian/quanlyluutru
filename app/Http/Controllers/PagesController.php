<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StayingRequest;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\CustomerRepository;
use App\Repositories\Eloquents\HotelCustomerRepository;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Eloquents\OwnerRepository;
use App\Repositories\Eloquents\NoticeRepository;
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
	protected $noticeRepository;

	public function __construct(HotelRepository $hotelRepository, CustomerRepository $customerRepository, HotelCustomerRepository $hotelCustomRepository, UserRepository $userRepository, OwnerRepository $ownerRepository, NoticeRepository $noticeRepository)
	{
		$this->hotelRepository = $hotelRepository;
		$this->customerRepository = $customerRepository;
		$this->hotelCustomRepository = $hotelCustomRepository;
		$this->userRepository = $userRepository;
		$this->ownerRepository = $ownerRepository;
        $this->noticeRepository = $noticeRepository;
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
        $input_customer['sex'] = $request->sex;
    	$input_customer['foreign_flg'] = $request->foreign_flg;
        if ($request->foreign_flg)
        {
            $input_customer['nationality'] = $request->nationality;
            $input_customer['passport'] = $request->passport;
            $input_customer['passport_info'] = $request->passport_info;
            $input_customer['date_entry'] = Carbon::parse($request->date_entry)->format('Y-m-d H:i:s');
            $input_customer['port_entry'] = $request->port_entry;
            $input_customer['purpose_entry'] = $request->purpose_entry;
            $input_customer['permitted_start'] = Carbon::parse($request->permitted_start)->format('Y-m-d H:i:s');
            $input_customer['permitted_end'] = Carbon::parse($request->permitted_end)->format('Y-m-d H:i:s');

            if ($input_customer['permitted_start'] > $input_customer['permitted_end'])
            {
                return redirect()->back()
                    ->withInput($request->only('permitted_start'))
                    ->withErrors([
                        'permitted_start' => 'Vui lòng nhập đúng thời gian tạm trú !',
                    ]);
            }

            $customer = $this->customerRepository->findByField('passport', $request->passport)->first();
        }
        else
        {
            $input_customer['id_card'] = $request->id_card;
            $input_customer['address'] = $request->address;

            $customer = $this->customerRepository->findByField('id_card', $request->id_card)->first();
        }

    	if ( ! $customer) // case of the customer not exist
    	{
    		$customer = $this->customerRepository->create($input_customer);
    	}

        $today_visitors = $this->hotelCustomRepository->findWhere(['hotel_id' => Auth::user()->hotel_id, 'DATE(check_in)' => Carbon::now()->format('Y-m-d')]);
        if ($today_visitors->isEmpty())
        {
            // make notice
            $hotel = $this->hotelRepository->find(Auth::user()->hotel_id);
            $notice['message'] = $hotel->name . ' đã khai báo khách lưu trú.'; 
            $notice['url'] = route('admin.search.form');
            $notice['type'] = 3;
            $notice['read_flg'] = 0;

            $notice = $this->noticeRepository->create($notice);
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
        $input_hotel['room']      = (int) $request->hotel_room;
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

        // make notice
        $hotel = $this->hotelRepository->find(Auth::user()->hotel_id);
        $notice['message'] = $hotel->name . ' đã cập nhật thông tin.'; 
        $notice['url'] = route('admin.hotel.edit', Auth::user()->hotel_id);
        $notice['type'] = 4;
        $notice['read_flg'] = 0;

        $notice = $this->noticeRepository->create($notice);

        return redirect()->route('pages.setting')->with(['flash_level' => 'success', 'flash_message' => 'Đã cập nhật thông tin !']);
    }

    public function showFirstLoginForm()
    {
        // redirect if the user is logged in
        if (Auth::user()->isOfficial())
        {
            return redirect()->route('pages.top');
        }

    	$hotel = $this->hotelRepository->with('user')->where('id', '=', Auth::user()->hotel_id)->first();

    	return view('pages.firstLogin', compact('hotel'));
    }

    public function firstLogin(SettingRequest $request)
    {
    	$hotel = $this->hotelRepository->with('user')->where('id', '=', Auth::user()->hotel_id)->first();

        // update owner information
        $input_owner['name']            = $request->owner_name;
        $input_owner['birthday']        = Carbon::parse($request->owner_birthday)->format('Y-m-d');
        $input_owner['id_card']         = $request->owner_id_card;
        $input_owner['address']         = $request->owner_address;
        $input_owner['business_cert']   = $request->owner_business_cert;
        $input_owner['security']        = $request->owner_security;

        $owner = $this->ownerRepository->findByField('id_card', $request->owner_id_card)->first();

        if ( ! $owner)
        {
            $owner = $this->ownerRepository->create($input_owner);
            $owner_id = $owner->id;
        }
        else
        {
            $this->ownerRepository->update($input_owner, $owner->id);
            $owner_id = $owner->id;
        }

    	// update hotel information
        $input_hotel['owner_id']  = $owner_id;
        $input_hotel['name']      = $request->hotel_name;
        $input_hotel['address']   = $request->hotel_address;
        $input_hotel['phone']     = $request->hotel_phone;
        $input_hotel['room']      = (int) $request->hotel_room;
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
        $input_user['official_flg'] = 1;
        $this->userRepository->update($input_user, $hotel->user->id);

        // make notice
        $hotel = $this->hotelRepository->find(Auth::user()->hotel_id);
        $notice['message'] = $hotel->name . ' đã thiết lập thông tin.'; 
        $notice['url'] = route('admin.hotel.edit', Auth::user()->hotel_id);
        $notice['type'] = 1;
        $notice['read_flg'] = 0;

        $notice = $this->noticeRepository->create($notice);

        return redirect()->route('pages.top');
    }
}
