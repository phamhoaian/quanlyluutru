<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\HotelCustomerRepository;
use App\Repositories\Eloquents\NoticeRepository;

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

    	return view('admin.pages.dashboard', compact('motel_count', 'hotel_count', 'notices'));
    }

    public function getVisitors(Request $request)
    {
        if($request->ajax())
        {
            $men_visitors = $this->hotelCustomerRepository->findVisitorsByGenre(1, $request->type);
            $women_visitors = $this->hotelCustomerRepository->findVisitorsByGenre(2, $request->type);

            if ($men_visitors || $women_visitors)
            {
                return response()->json(array('type' => $request->type, 'men_visitors' => $men_visitors, 'women_visitors' => $women_visitors), 200);
            }
            else
            {
                return response()->json(array('error' => 'Not found'), 404);
            }
        }
        return FALSE;
    }
}
