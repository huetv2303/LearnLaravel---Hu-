<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ],
            $request->input('remember')
        )) {
            // Đăng nhập thành công, chuyển hướng đến route có tên là 'admin'
            return redirect()->route('admin');
        }
        Session::flash('error', 'email hoặc mật khẩu không chính xác');
        // Đăng nhập thất bại, chuyển hướng về trang đăng nhập
        return redirect()->back();
    }

}
