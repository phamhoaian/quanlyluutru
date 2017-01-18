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

	public function findVisitorsByHotelId($hotel_id)
	{
		$visitors = $this->model->select(DB::raw('DATE(check_in) date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->groupBy(DB::raw('DATE(check_in)'))
								->orderBy('date', 'ASC')
								->get();
		return $visitors;
	}
}