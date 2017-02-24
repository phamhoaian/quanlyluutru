<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use DB;

class HotelRepository extends BaseRepository
{
	public function model()
	{
		return 'App\Hotel';
	}

	public function getCountMotel()
	{
		return $this->findWhere(['type' => 1, 'delete_flg' => 1])->count();
	}

	public function getCountHotel()
	{
		return $this->findWhere(['type' => 2, 'delete_flg' => 1])->count();
	}

	public function getHotelNotDeclare()
	{
		return $this->model->select('hotels.id as hotel_id', DB::raw('owners.name as owner_name'), DB::raw('hotels.name as hotel_name'), 'hotels.address', 'hotels.type')
		  				   ->leftJoin('hotel_customer_map', 'hotel_customer_map.hotel_id', '=', 'hotels.id')
						   ->leftJoin('owners', 'hotels.owner_id', '=', 'owners.id')
						   ->whereNotIn('hotels.id', function($query){
					   			$query->select('hotel_id')
					   				  ->from('hotel_customer_map')
					   				  ->whereRaw('DATE(hotel_customer_map.check_in) = CURDATE()')
					   				  ->groupBy('hotel_id');
						   })
						   ->groupBy('hotels.id')
						   ->get()
						   ->toArray();
	}
}