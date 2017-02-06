<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Eloquents\HotelRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserChangePasswordRequest;
use Auth;
use Hash;
use File;
use Mail;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository, HotelRepository $hotelRepository)
	{
		$this->userRepository = $userRepository;
        $this->hotelRepository = $hotelRepository;
	}

    public function showListUsers()
    {
    	$users = $this->userRepository->getListUsers();
    	return view('admin.user.list', compact('users'));
    }

    public function showUserFormAdd()
    {
        $hotels = $this->hotelRepository->findByField('delete_flg', 0);
        $list_hotel = array();
        foreach ($hotels as $hotel) 
        {
            $list_hotel[$hotel->id] = $hotel->name;
        }
    	return view('admin.user.add', compact('list_hotel'));
    }

    public function userFormAdd(UserRequest $request)
    {
        $active_key = md5(rand().microtime());

        $input['hotel_id']  = $request->hotel;
        $input['email']     = $request->email;
        $tmp_password       = str_random(6);
        $input['password']  = bcrypt($tmp_password);
        $input['active_key'] = $active_key;
        $input['active_flg'] = 0;

        $user = $this->userRepository->create($input);

        Mail::send('email.activation', ['email' => $request->email, 'password' => $tmp_password, 'active_key' => $active_key], function($message) {
            $message->to(Input::get('email'))
                ->subject('Kích hoạt tài khoản');
        });

        return redirect()->route('admin.user.list')->with(['flash_level' => 'success', 'flash_message' => 'Đã thêm tài khoản mới !']);
    }

    public function showUserFormEdit($id)
    {
        $hotels = $this->hotelRepository->findByField('delete_flg', 0);
        $list_hotel = array();
        foreach ($hotels as $hotel) 
        {
            $list_hotel[$hotel->id] = $hotel->name;
        }
        $user = $this->userRepository->find($id);
        return view('admin.user.edit', compact('list_hotel', 'user'));
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

        return redirect()->route('admin.user.edit', $id)->with(['update' => TRUE, 'flash_level' => 'success', 'flash_message' => 'Đã cập nhật thông tin tài khoản !']);
    }

    public function uploadAvatar(Request $request, $id)
    {
        $current_photo = 'public/uploads/user/'.$request->current_photo; 
        if ( ! empty($request->hasFile('photo')))
        {
            $file_name = time() . '.'. $request->file('photo')->getClientOriginalExtension();
            $input['photo'] = $file_name;
            $request->file('photo')->move('public/uploads/user/', $file_name);
            if (File::exists($current_photo))
            {
                File::delete($current_photo);
            }

            $user = $this->userRepository->update($input, $id);
            return redirect()->route('admin.user.edit', ['id' => $id, '#tab_1_2'])->with(['upload_avatar' => TRUE, 'flash_level' => 'success', 'flash_message' => 'Đã thay đổi ảnh đại diện !']);
        }
        else
        {
            $input['photo'] = $current_photo;
            $user = $this->userRepository->update($input, $id);
            return redirect()->route('admin.user.edit', ['id' => $id, '#tab_1_2']);
        }
    }

    public function changePassword(UserChangePasswordRequest $request, $id)
    {
        $current_password = Auth::user()->password;
        if (Hash::check($request->current_password, $current_password))
        {
            $input['password']  = Hash::make($request->new_password);
            $user = $this->userRepository->update($input, Auth::user()->id);

            return redirect()->route('admin.user.edit', ['id' => $id, '#tab_1_3'])->with(['change_password' => TRUE, 'flash_level' => 'success', 'flash_message' => 'Đã thay đổi mật khẩu mới !']);
        }
        else
        {
            return redirect()->route('admin.user.edit', ['id' => $id, '#tab_1_3'])->with(['change_password' => TRUE, 'flash_level' => 'danger', 'flash_message' => 'Mật khẩu hiện tại không đúng !']);
        }
    }
}
