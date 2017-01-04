<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
    	return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	if (Auth::attempt(['email' => $email, 'password' => $password])) // correct
    	{
            if (Auth::user()->isAdmin())
            {
                return redirect('/quan-ly/tong-quan');
            }
            else
            {
                return redirect('/');
            }
        }
        else // failed
        {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email hoặc mật khẩu không đúng !',
                ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
