<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelCustomerRepository;
use CarBon\Carbon;
use Illuminate\Support\Facades\Input;
use DB;

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
    	$where = array();
		if ($request->hotel_name != '') {
			$where[] = ['hotels.name', 'like', '%'.$request->hotel_name.'%'];
		}
		if ($request->customer_name != '') {
			$where[] = ['customers.name', 'like', '%'.$request->customer_name.'%'];
		}
		if ($request->customer_genre != '') {
			$where[] = ['customers.sex', '=', intval($request->customer_genre)];
		}
		if ($request->customer_id_card != '') {
			$where[] = [DB::raw('customers.id_card like "%'.$request->customer_id_card.'%" or customers.passport like "%'.$request->customer_id_card.'%"'), '!=', ''];
		}
		if ($request->room_number != '') {
			$where[] = ['room_number', '=', $request->room_number];
		}
		if ($request->date_range != '') {
			$date_range = explode('-', $request->date_range);
			$start = trim($date_range[0]);
			$end = trim($date_range[1]);
			$where[] = ['check_in', '>=', Carbon::parse(str_replace('/', '-', $start))->format('Y-m-d 00:00:00')];
			$where[] = ['check_in', '<=', Carbon::parse(str_replace('/', '-', $end))->format('Y-m-d 23:59:59')];
		}

    	$iTotalRecords = $this->hotelCustomerRepository->getNumberVisitorsByFilter();
    	$iFilteredRecords = $this->hotelCustomerRepository->getNumberVisitorsByFilter($where);
		$iDisplayLength = intval($request->length);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($request->start);
		$sEcho = intval($request->draw);

		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$orderBy = array();
		if ($request->order[0]['column'] != '' && $request->order[0]['dir'] != '')
		{
			$orderBy[0] = $this->getColumnOrder($request->order[0]['column']);
			$orderBy[1] = $request->order[0]['dir'];
		}

		$hotelCustomerData = $this->hotelCustomerRepository->findVisitorsByFilter($where, $orderBy, $iDisplayLength, $iDisplayStart);

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

			if ( ! $row->customer_foreign_flg) {
				$customer_id = $row->customer_id_card;
			} else {
				$customer_id = $row->customer_passport;
			}

			$records["data"][] = array(
			  $row->hotel_name,
			  $row->customer_name,
			  $row->customer_year_of_birth,
			  $sex,
			  $customer_id,
			  $row->room_number,
			  Carbon::parse($row->check_in)->format('d/m/Y H:i'),
			  Carbon::parse($row->check_out)->format('d/m/Y H:i'),
			  '<a href="'.route('admin.staying.info', $row->id).'" class="btn btn-xs blue"><i class="fa fa-edit"></i>Xem</a>'
			);

			
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iFilteredRecords;

		echo json_encode($records);
    }

    public function showCountingForm()
    {
    	$date = Input::get('ngay', FALSE);
    	$date = Carbon::parse(str_replace('/', '-', $date))->format('d/m/Y');
    	$date = $date . ' - ' . $date;

    	return view('admin.statistics.counting', compact('date'));
    }

    public function counting(Request $request)
    {
    	$where = array();
    	if ($request->hotel_name != '') {
			$where[] = ['hotels.name', 'like', '%'.$request->hotel_name.'%'];
		}
		if ($request->date_range != '') {
			$date_range = explode('-', $request->date_range);
			$start = trim($date_range[0]);
			$end = trim($date_range[1]);
			$where[] = ['check_in', '>=', Carbon::parse(str_replace('/', '-', $start))->format('Y-m-d 00:00:00')];
			$where[] = ['check_in', '<=', Carbon::parse(str_replace('/', '-', $end))->format('Y-m-d 23:59:59')];
		}

    	$iTotalRecords = $this->hotelCustomerRepository->getNumberCountingByFilter();
    	$iFilteredRecords = $this->hotelCustomerRepository->getNumberCountingByFilter($where);
		$iDisplayLength = intval($request->length);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($request->start);
		$sEcho = intval($request->draw);

		$records = array();
		$records["data"] = array(); 

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$orderBy = array();
		if ($request->order[0]['column'] != '' && $request->order[0]['dir'] != '')
		{
			$orderBy[0] = $this->getColumnOrderCounting($request->order[0]['column']);
			$orderBy[1] = $request->order[0]['dir'];
		}

		$countingData = $this->hotelCustomerRepository->findCountingByFilter($where, $orderBy, $iDisplayLength, $iDisplayStart);
		
		if ( ! $countingData)
		{
			return FALSE;
		}

		$summaryCoutingMen = 0;
		$summaryCoutingWomen = 0;
		foreach ($countingData as $key => $row) {

			$records["data"][] = array(
				$row->hotel_name,
				number_format($row->men),
				number_format($row->women)
			);

			$summaryCoutingMen += intval($row->men);
			$summaryCoutingWomen += intval($row->women);
		}

		// $summaryCouting = $this->hotelCustomerRepository->findSummaryCoungting($where);

		// if ( ! $summaryCouting)
		// {
		// 	return FALSE;
		// }
		// else
		// {
			$records["data"][] = array(
				'<strong>Tổng cộng</strong>',
				'<strong>'.number_format($summaryCoutingMen).'</strong>',
				'<strong>'.number_format($summaryCoutingWomen).'</strong>'
			);
		// }

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iFilteredRecords;

		echo json_encode($records);
    }

    public function showStayingInfo($id)
    {
    	$staying = $this->hotelCustomerRepository->find($id);
    	return view('admin.statistics.staying', compact('staying'));
    }

    private function getColumnOrder($column)
    {
    	$data = array(
    		0 => 'hotels.name',
    		1 => 'customers.name',
    		6 => 'check_in',
    		7 => 'check_out'
		);
		return $data[$column];
    }

    private function getColumnOrderCounting($column)
    {
    	$data = array(
    		0 => 'hotels.name',
    		1 => 'men',
    		2 => 'women'
		);
		return $data[$column];
    }
}
