<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
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
    use SendsPasswordResetEmails;
    
    public function showLinkRequestForm()
    {
        return view('auth.passwords.request');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['login_id' => 'required'], ['login_id.required' => 'ユーザーIDを入力してください']);
    
         $response = $this->broker()->sendResetLink(
            $request->only('login_id')
        );
    
        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }
    
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
    
}
