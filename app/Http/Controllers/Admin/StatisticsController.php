<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelCustomerRepository;

class StatisticsController extends Controller
{
	protected $hotelCustomerRepository;

    public function __construct(HotelCustomerRepository $hotelCustomerRepository)
    {
    	$this->hotelCustomerRepository = $hotelCustomerRepository;
    }

    public function showSearchForm()
    {
    	$hotelCustomerData = $this->hotelCustomerRepository->getAll(0, 10);
		dd($hotelCustomerData);
    	return view('admin.statistics.search');
    }

    public function search(Request $request)
    {
    	$iTotalRecords = $this->hotelCustomerRepository->getCount();
		$iDisplayLength = intval($request->length);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($request->start);
		$sEcho = intval($request->draw);

		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$hotelCustomerData = $this->hotelCustomerRepository->getAll($iDisplayStart, $end);
		dd($hotelCustomerData);
		for($i = $iDisplayStart; $i < $end; $i++) {
			$records["data"][] = array(

			  'Nhà nghỉ Ánh Ngọc',
			  'Trần Văn A',
			  rand(1950, 2010),
			  'Nam',
			  '280909090',
			  'Thuận An, Bình Dương',
			  rand(101, 200),
			  '12/12/2016 12:34',
			  '12/12/2016 12:34',
			);
		}

		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
		$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
    }
}
