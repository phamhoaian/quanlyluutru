<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

class CustomerRepository extends BaseRepository
{
	public function model()
	{
		return 'App\Customer';
	}
}