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

	public function findVisitorsByFilter($where = NULL, $orderBy = NULL, $limit, $offset)
	{
		$query = $this->model->select('hotel_id', 
								    DB::raw('hotels.name as hotel_name'), 
								    'customer_id', 
								    DB::raw('customers.name as customer_name'), 
								    DB::raw('customers.year_of_birth as customer_year_of_birth'), 
								    DB::raw('customers.sex as customer_sex'), 
								    DB::raw('customers.id_card as customer_id_card'), 
								    DB::raw('customers.address as customer_address'), 
								    'room_number', 
								    'check_in', 
								    'check_out')
						   ->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
						   ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');
	    if ($where) 
	    {
	    	$query->where($where);
	    }	

	    if ($orderBy)
	    {
	    	$query->orderBy($orderBy[0], $orderBy[1]);
	    }
	    else
	    {
	    	$query->orderBy('check_in', 'DESC');
	    }   	
	   	
		$query->take($limit)
			  ->skip($offset);
	   	return $query->get();
	}

	public function getCountVisitorsByFilter($where = NULL)
	{
		$query = $this->model->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
						   	 ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');
	   	if ($where) 
	    {
	    	$query->where($where);
	    }
		return $query->count();
	}
}