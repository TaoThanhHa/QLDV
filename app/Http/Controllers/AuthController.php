<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('doanviens');
        }

        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function showRegistrationForm()
    {
        $khoas = [1 => 'Khoa Công Nghệ Thông Tin', 2 => 'Khoa Kinh Tế', 3 => 'Khoa Du Lịch', 4 => 'Khoa Y Dược', 5 => 'Khoa Cơ khí', 6 => 'Khoa Ngôn Ngữ',];
        return view('auth.register', compact('khoas'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'ten_khoa' => 'required',
            'ten_truong' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'ten_khoa' => $request->ten_khoa,
            'ten_truong' => $request->ten_truong,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
