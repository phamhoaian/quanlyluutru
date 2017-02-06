<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquents\UserRepository;
use Auth;
use Hash;

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

    public function changePassword(Request $request)
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
}
