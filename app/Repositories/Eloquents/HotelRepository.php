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
}