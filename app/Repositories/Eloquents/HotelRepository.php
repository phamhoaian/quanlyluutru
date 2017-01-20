<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

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
}