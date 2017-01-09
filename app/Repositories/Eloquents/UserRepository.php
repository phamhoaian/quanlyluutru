<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

class UserRepository extends BaseRepository
{
	public function model()
	{
		return 'App\User';
	}

	public function getListUsers()
	{
		return $this->findByField('role_id', 1);
	}
}