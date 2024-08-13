<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('Dashboard.auth-forgotpw');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect('/login')->with('success', 'Password reset link sent successfully.');
        } else {
            if ($status === Password::INVALID_USER) {
                // Customize the error message for "We can't find a user with that email address."
                $customErrorMessage = 'The email address provided is not registered. Please check your email address and try again.';
            } else {
                // Use the default error message if it's not Password::INVALID_USER
                $customErrorMessage = __($status);
            }
            return back()->withInput($request->only('email'))->with('error', $customErrorMessage);
        }
    }
}
