<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\UserRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserChangePasswordRequest;
use Auth;

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

    public function showUserFormEdit($id)
    {
        $user = $this->userRepository->find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function userFormEdit(UserRequest $request, $id)
    {
        if (Auth::id() != $id)
        {
            $input['hotel_id']  = $request->hotel;
        }        
        $input['email']     = $request->email;
        $input['note']      = $request->note;

        $user = $this->userRepository->update($input, $id);

        return redirect()->route('admin.user.edit', $id)->with(['flash_level' => 'success', 'flash_message' => 'Đã cập nhật thông tin tài khoản !']);
    }

    public function uploadAvatar(UserRequest $request, $id)
    {
        # code...
    }

    public function changePassword(UserChangePasswordRequest $request, $id)
    {
        $current_password = $request->current_password;
    }
}
