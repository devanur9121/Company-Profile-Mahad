<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserControllers extends Controller
{
    public function index()
    {
        return view('Dashboard.auth-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $request->session()->put('last_activity', now());

            if ($request->has('remember')) {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }

            return redirect()->intended('/beranda')->with('success', 'SELAMAT LOGIN BERHASIL!');
        } else {
            return back()->with('error', 'Mohon Maaf Login gagal!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
