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
				$visitors = $this->model->select(DB::raw('WEEKOFYEAR(check_in) week'), DB::raw('MIN(check_in) as date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 5 WEEK)'))
								->groupBy(DB::raw('WEEKOFYEAR(check_in)'))
								->orderBy('check_in', 'ASC')
								->take(5)
								->get();
				break;	
			case 'month':
				$visitors = $this->model->select(DB::raw('MONTH(check_in) month'), DB::raw('MIN(check_in) as date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 5 MONTH)'))
								->groupBy(DB::raw('MONTH(check_in)'))
								->orderBy('check_in', 'ASC')
								->take(5)
								->get();
				break;
			default:
				$visitors = $this->model->select(DB::raw('DATE(check_in) date'), DB::raw('COUNT(id) as number'))
								->where('hotel_id', $hotel_id)
								->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 10 DAY)'))
								->groupBy(DB::raw('DATE(check_in)'))
								->orderBy('date', 'ASC')
								->take(10)
								->get();
				break;
		}
		
		return $visitors;
	}

	public function findVisitorsByGenre($sex, $type)
	{
		if ($sex == 'men') {
			$sex_id = 1;
		} else {
			$sex_id = 2;
		}

		switch ($type) {
			case 'week':
				$visitors = $this->model->select(DB::raw('WEEKOFYEAR(check_in) week'), DB::raw('MIN(check_in) as day'), DB::raw('COUNT(hotel_customer_map.id) as '.$sex))
										->join('customers', 'hotel_customer_map.customer_id', '=', 'customers.id')
										->where('sex', $sex_id)
										->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 5 WEEK)'))
										->groupBy(DB::raw('WEEKOFYEAR(check_in)'))
										->orderBy('check_in', 'ASC')
										->take(3)
										->get()
										->toArray();
				break;	
			case 'month':
				$visitors = $this->model->select(DB::raw('MONTH(check_in) month'), DB::raw('MIN(check_in) as day'), DB::raw('COUNT(hotel_customer_map.id) as '.$sex))
										->join('customers', 'hotel_customer_map.customer_id', '=', 'customers.id')
										->where('sex', $sex_id)
										->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 5 MONTH)'))
										->groupBy(DB::raw('MONTH(check_in)'))
										->orderBy('check_in', 'ASC')
										->take(3)
										->get()
										->toArray();
				break;
			default:
				$visitors = $this->model->select(DB::raw('DATE(check_in) day'), DB::raw('COUNT(hotel_customer_map.id) as '.$sex))
										->join('customers', 'hotel_customer_map.customer_id', '=', 'customers.id')	
										->where('sex', $sex_id)
										->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 10 DAY)'))
										->groupBy(DB::raw('DATE(check_in)'))
										->orderBy('day', 'ASC')
										->take(10)
										->get()
										->toArray();
				break;
		}
		
		return $visitors;
	}

	public function getHotelHaveDeclared()
	{
		return $this->model->select('hotel_id')
						   ->where(DB::raw('DATE(created_at)'), '=', DB::raw('CURDATE()'))
						   ->groupBy('hotel_id')
						   ->get()
						   ->toArray();
	}
}