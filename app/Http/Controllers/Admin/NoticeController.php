<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\NoticeRepository;
use Carbon\Carbon;

class NoticeController extends Controller
{
	protected $noticeRepository;

	public function __construct(NoticeRepository $noticeRepository)
	{
		$this->noticeRepository = $noticeRepository;
        Carbon::setLocale('vi');
	}

    public function showListNotice()
    {
    	$notice = $this->noticeRepository->getLatestNotice(15);
    	return view('admin.notice.list', compact('notice'));
    }

    public function renderNoticeLink($id)
    {
    	$notice = $this->noticeRepository->find($id);

    	if ( ! $notice->read_flg)
    	{
    		$upd_data['read_flg'] = 1;
            $this->noticeRepository->update($upd_data, $id);
    	}

    	if ($notice->url)
    	{
    		return redirect()->to($notice->url);
    	}
    	else
    	{
    		return redirect()->route('admin.top');
    	}
    }
}
