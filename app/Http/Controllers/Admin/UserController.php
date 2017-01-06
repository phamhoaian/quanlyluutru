<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\UserRepository;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

    public function showListUsers()
    {
    	$users = $this->userRepository->getListUsers();
    	return view('admin.user.list', compact('users'));
    }

    public function showUserFormAdd()
    {
    	return view('admin.user.add');
    }

    public function userFormAdd(UserRequest $request)
    {
        $input['hotel_id']  = $request->hotel;
        $input['email']     = $request->email;
        $tmp_password       = str_random(10);
        $input['password']  = bcrypt($tmp_password);

        $user = $this->userRepository->create($input);

        return redirect()->route('admin.user.list')->with(['flash_level' => 'success', 'flash_message' => 'Đã thêm tài khoản mới !']);
    }
}
