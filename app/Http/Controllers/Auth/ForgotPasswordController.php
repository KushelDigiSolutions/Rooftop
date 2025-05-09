<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    


    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) use ($request) {
                $url = url(route('password.reset', [
                    'token' => $token,
                    'email' => $user->email,
                ], false));

                $data = [
                    'name' => $user->name ?? 'User',
                    'email' => $user->email,
                    'url' => $url,
                ];

                Mail::to($user->email)->send(new ResetPasswordMail($data));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
