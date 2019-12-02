<?php

namespace App\Http\Controllers;
// use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public  function login(Request $request)
    {
        $data = $request->all;
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials) && Auth::check()) {

            $userInfo = Auth::user();
            $userRole = $userInfo->role;

            if ($userRole == 'admin') {
                return redirect()->intended('admin');
            }else{
                Auth::logout();
                return view('adminpage.loginadmin')->with('successMsg', 'tk ko co quyen truy cap admin ');
            }
        } else {
            // return redirect()->intended('admin/login');
            // return redirect()->to('/admin/login')->with(['msg' =>'Đăng nhập bị lỗi']);
            return view('adminpage.loginadmin')->with('successMsg', 'Invalid username or password');
        }
    }
}
