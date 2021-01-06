<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class AuthManageController extends Controller
{
    // Show View Login
    public function viewLogin()
    {
    	$users = User::all()
    	->count();

    	return view('login', array('users' => 0,'url' => '/verify_login'));
    }

    public function viewRegist()
    {
        return view('login', array('users' => 2,'url' => '/first_account'));
    }

    public function viewRegistPeng()
    {
        return view('login', array('users' => 1,'url' => '/first_account'));
    }

    // Verify Login
    public function verifyLogin(Request $request)
    {
    	if(Auth::attempt($request->only('username', 'password'))){
            if (Auth::user()->role == "admin" ) {
                return redirect('/dashboard');
            }elseif (Auth::user()->role == "pengusaha") {
                return redirect('/dashboard');
            }else{
                return redirect('/profile');
            }
    		//
    	}
    	Session::flash('login_failed', 'Username atau password salah');
    	
    	return redirect('/login');
    }

    // Logout Process
    public function logoutProcess()
    {
    	Auth::logout();

    	return redirect('/login');
    }
}