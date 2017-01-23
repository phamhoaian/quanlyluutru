<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelCustomerRepository;
use CarBon\Carbon;

class StatisticsController extends Controller
{
	protected $hotelCustomerRepository;

    public function __construct(HotelCustomerRepository $hotelCustomerRepository)
    {
    	$this->hotelCustomerRepository = $hotelCustomerRepository;
    }

    public function showSearchForm()
    {
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

		$hotelCustomerData = $this->hotelCustomerRepository->getAll($iDisplayLength, $iDisplayStart);
		
		if ( ! $hotelCustomerData)
		{
			return FALSE;
		}

		foreach ($hotelCustomerData as $key => $row) {
			if ($row->customer_sex == 1) {
				$sex = '<span class="label label-sm label-info">Nam</span>';
			} else {
				$sex = '<span class="label label-sm label-danger">Nữ</span>';
			}

			$records["data"][] = array(
			  $row->hotel_name,
			  $row->customer_name,
			  $row->customer_year_of_birth,
			  $sex,
			  $row->customer_id_card,
			  $row->customer_address,
			  $row->room_number,
			  Carbon::parse($row->check_in)->format('d/m/Y H:i'),
			  Carbon::parse($row->check_out)->format('d/m/Y H:i'),
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
