<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquents\UserRepository;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserResetPasswordRequest;
use Auth;
use Hash;
use Mail;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

    public function activationUser($active_key)
    {
    	if ( ! $active_key)
    	{
    		return response()->view('errors.404', [], 404);
    	}

    	$user = $this->userRepository->findByField('active_key', $active_key)->first();

    	if ( ! $user)
    	{
    		return response()->view('errors.404', [], 404);
    	}

    	$input_user['active_flg'] = 1;
    	$input_user['active_key'] = NULL;
    	$this->userRepository->update($input_user, $user->id);

    	Auth::logout();

    	return redirect('/');
    }

    public function showChangePasswordForm()
    {
        return view('pages.changePassword');
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        $current_password = Auth::user()->password;
        if (Hash::check($request->current_password, $current_password))
        {
            $input['password']  = Hash::make($request->new_password);
            $user = $this->userRepository->update($input, Auth::user()->id);

            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Đã thay đổi mật khẩu mới !']);
        }
        else
        {
            return redirect()->back()
                             ->withInput($request->only('current_password'))
                             ->withErrors([
                                'current_password' => 'Mật khẩu hiện tại không đúng !',
                             ]);
        }
    }

    public function showResetPasswordForm()
    {
        return view('pages.resetPassword');
    }

    public function resetPassword(UserResetPasswordRequest $request)
    {
        $user = $this->userRepository->findByField('email', $request->email)->first();

        if ($user)
        {
            $new_password = str_random(6);
            $input['password']  = Hash::make($new_password);
            $this->userRepository->update($input, $user->id);

             Mail::send('email.resetPassword', ['email' => $request->email, 'password' => $new_password], function($message) {
                $message->to(Input::get('email'))
                    ->subject('Khôi phục mật khẩu mới');
            });

            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Chúng tôi đã gửi link khởi tạo mật khẩu mới qua email của bạn. Vui lòng kiểm tra email!']);
        }
        else
        {
            return redirect()->back()
                             ->withInput($request->only('email'))
                             ->withErrors([
                                'email' => 'Email này chưa đăng ký !',
                             ]);
        }
    }
}
