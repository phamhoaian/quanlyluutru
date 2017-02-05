<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;

class NoticeRepository extends BaseRepository
{
	public function model()
	{
		return 'App\Notice';
	}

	public function getLatestNotice($limit)
	{
		return $this->model->orderBy('created_at', 'DESC')
					->paginate($limit);
	}
}