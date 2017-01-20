<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\HotelCustomerRepository;
use App\Repositories\Eloquents\NoticeRepository;
use DB;

class DashboardController extends Controller
{
	protected $hotelRepository;
	protected $hotelCustomerRepository;
	protected $noticeRepository;

    public function __construct(HotelRepository $hotelRepository, HotelCustomerRepository $hotelCustomerRepository, NoticeRepository $noticeRepository)
    {
    	$this->hotelRepository = $hotelRepository;
    	$this->hotelCustomerRepository = $hotelCustomerRepository;
    	$this->noticeRepository = $noticeRepository;
    }

    public function index()
    {
    	// get number of motel
    	$motel_count = $this->hotelRepository->getCountMotel();

    	// get number of hotel
    	$hotel_count = $this->hotelRepository->getCountHotel();

    	// get latest notification
    	$notices = $this->noticeRepository->getLatestNotice(10);

    	// get number of motel/hotel have declared
    	$declared = $this->hotelCustomerRepository->getHotelHaveDeclared();
    	$declared = count($declared);

    	// get number of motel/hotel not yet declare
    	$not_declare = ((int) $motel_count + (int) $hotel_count) - (int) $declared;

    	return view('admin.pages.dashboard', compact('motel_count', 'hotel_count', 'notices', 'declared', 'not_declare'));
    }

    public function getVisitors(Request $request)
    {
        if($request->ajax())
        {
            $men_visitors = $this->hotelCustomerRepository->findVisitorsByGenre('men', $request->type);
            $women_visitors = $this->hotelCustomerRepository->findVisitorsByGenre('women', $request->type);

            $result = array_merge($men_visitors, $women_visitors);

	        $visitors = array();

	        foreach ($result as $key => $value) {

				$visitors[$value[$request->type]]['day'] = $value['day'];

	        	if (isset($value['men'])) 
	        	{
	        		$visitors[$value[$request->type]]['men'] = $value['men'];
	        	}
	        	if ( ! isset($visitors[$value[$request->type]]['men'])) 
	        	{
	        		$visitors[$value[$request->type]]['men'] = 0;
	        	}

	        	if (isset($value['women'])) 
	        	{
	        		$visitors[$value[$request->type]]['women'] = $value['women'];
	        	}   
	        	if ( ! isset($visitors[$value[$request->type]]['women'])) 
	        	{
	        		$visitors[$value[$request->type]]['women'] = 0;
	        	}

	        	if (isset($value['week']))
	        	{
	        		$visitors[$value[$request->type]]['week'] = $value['week'];
	        	}    	

	        	if (isset($value['month']))
	        	{
	        		$visitors[$value[$request->type]]['month'] = $value['month'];
	        	}  
	        }

	        usort($visitors, function($a, $b){
	        	return $a['day'] > $b['day'];
	        });

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
}
