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
								->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 7 DAY)'))
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
										->where('check_in', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 7 DAY)'))
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
								    DB::raw('customers.foreign_flg as customer_foreign_flg'), 
								    DB::raw('customers.nationality as customer_nationality'), 
								    DB::raw('customers.passport as customer_passport'), 
								    DB::raw('customers.passport_info as customer_passport_info'), 
								    DB::raw('customers.date_entry as customer_date_entry'), 
								    DB::raw('customers.port_entry as customer_port_entry'), 
								    DB::raw('customers.purpose_entry as customer_purpose_entry'), 
								    DB::raw('customers.permitted_start as customer_permitted_start'), 
								    DB::raw('customers.permitted_end as customer_permitted_end'), 
								    'hotel_customer_map.id',
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

	public function getNumberVisitorsByFilter($where = NULL)
	{
		$query = $this->model->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
						   	 ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');
	   	if ($where) 
	    {
	    	$query->where($where);
	    }
		return $query->count();
	}

	public function findCountingByFilter($where = NULL, $orderBy = NULL, $limit, $offset)
	{
		$query = $this->model->select('hotel_id',
							          DB::raw('hotels.name as hotel_name'),
							          DB::raw('SUM(CASE WHEN sex = 1 THEN 1 ELSE 0 END) as men'),
							          DB::raw('SUM(CASE WHEN sex = 2 THEN 1 ELSE 0 END) as women'))
							 ->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
							 ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');

	 	if ($where) 
	    {
	    	$query->where($where);
	    }	

	    $query->groupBy('hotel_id');

	    if ($orderBy)
	    {
	    	$query->orderBy($orderBy[0], $orderBy[1]);
	    }
	    else
	    {
	    	$query->orderBy('hotels.name', 'ASC');
	    }   	
	   	
		$query->take($limit)
			  ->skip($offset);
	   	return $query->get();
	}

	public function getNumberCountingByFilter($where = NULL)
	{
		$query = $this->model->select('hotel_id',
							          DB::raw('hotels.name as hotel_name'),
							          DB::raw('SUM(CASE WHEN sex = 1 THEN 1 ELSE 0 END) as men'),
							          DB::raw('SUM(CASE WHEN sex = 2 THEN 1 ELSE 0 END) as women'))
							 ->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
							 ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');

	 	if ($where) 
	    {
	    	$query->where($where);
	    }	

	    $query->groupBy('hotel_id');

	    return count($query->get());
	}

	public function findSummaryCoungting($where = NULL)
	{
		$query = $this->model->select(DB::raw('SUM(CASE WHEN sex = 1 THEN 1 ELSE 0 END) as men'),
							          DB::raw('SUM(CASE WHEN sex = 2 THEN 1 ELSE 0 END) as women'))
							 ->leftJoin('hotels', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
							 ->leftJoin('customers', 'hotel_customer_map.customer_id', '=', 'customers.id');

	 	if ($where) 
	    {
	    	$query->where($where);
	    }

	    return $query->first();
	}
}