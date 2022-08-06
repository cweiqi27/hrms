<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    // Email verification page
    public function verify()
    {
        return view("auth.verify-email");
    }

    // Handle email verification action
    public function verifyHandler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect("/");
    }

    // Resend verification email
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with(
            "message",
            "A new verification link has been sent!"
        );
    }

    // Forgot password page
    public function forgot()
    {
        return view("auth.forgot-password");
    }

    // Handle forgot password, send password reset link to email
    public function forgotHandler(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        $status = Password::sendResetLink($request->only("email"));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(["status" => __($status)])
            : back()->withErrors(["email" => __($status)]);
    }

    // Reset password form page
    public function reset($token)
    {
        return view("auth.reset-password", ["token" => $token]);
    }

    // Handle reset password action
    public function resetHandler(Request $request)
    {
        $request->validate([
            "token" => "required",
            "email" => "required|email",
            "password" => "required|confirmed|min:7",
        ]);

        $status = Password::reset(
            $request->only(
                "email",
                "password",
                "password_confirmation",
                "token"
            ),
            function ($user, $password) {
                $user
                    ->forceFill([
                        "password" => Hash::make($password),
                    ])
                    ->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route("login")
                ->with("status", __($status))
            : back()->withErrors(["email" => [__($status)]]);
    }

    // Confirm password page
    public function confirm()
    {
        return view('auth.confirm-password');
    }

    // Confirm password handler
    public function confirmHandler(Request $request)
    {
        if(! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['Password invalid.']
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }
}
