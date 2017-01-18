<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use DB;

class HotelCustomerRepository extends BaseRepository
{
	public function model()
	{
		return 'App\HotelCustomer';
	}

	public function findVisitorsByHotelId($hotel_id, $type)
	{
		switch ($type) {
			case 'week':
				$visitors = $this->model->select(DB::raw('WEEKOFYEAR(check_in) date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->groupBy(DB::raw('WEEKOFYEAR(check_in)'))
								->orderBy('date', 'ASC')
								->take(10)
								->get();
				break;	
			case 'month':
				$visitors = $this->model->select(DB::raw('MONTH(check_in) date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->groupBy(DB::raw('MONTH(check_in)'))
								->orderBy('date', 'ASC')
								->take(10)
								->get();
				break;
			default:
				$visitors = $this->model->select(DB::raw('DATE(check_in) date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->groupBy(DB::raw('DATE(check_in)'))
								->orderBy('date', 'ASC')
								->take(10)
								->get();
				break;
		}
		
		return $visitors;
	}
}