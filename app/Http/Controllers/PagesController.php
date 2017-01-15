<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StayingRequest;
use App\Repositories\Eloquents\CustomerRepository;
use App\Repositories\Eloquents\HotelCustomerRepository;
use Auth;
use Carbon\Carbon;

class PagesController extends Controller
{
	protected $customerRepository;
	protected $hotelCustomRepository;

	public function __construct(CustomerRepository $customerRepository, HotelCustomerRepository $hotelCustomRepository)
	{
		$this->customerRepository = $customerRepository;
		$this->hotelCustomRepository = $hotelCustomRepository;
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
}
