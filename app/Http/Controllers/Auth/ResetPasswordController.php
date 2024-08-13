<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        return view('Dashboard.auth-resetpw', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required', // Remove the 'confirmed' rule
        ]);

        if ($request->password !== $request->password_confirmation) {
            return back()->withInput()->with('error', 'Password dan konfirmasi password tidak sesuai.');
        }

        $status = Password::reset($request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        ), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password berhasil direset.');
        } else {
            if ($status === Password::INVALID_TOKEN) {
                return back()->withInput($request->only('email'))->with('error', 'Token kedaluwarsa atau tidak valid. Silakan minta reset password kembali.');
            } else {
                return back()->withInput($request->only('email'))->with('error', __($status));
            }
        }
    }
}
