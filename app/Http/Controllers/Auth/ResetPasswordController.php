<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
          ['token' => $token, 'login_id' => $request->login_id]
        );
    }
    
    protected function credentials(Request $request)
    {
        return $request->only(
            'login_id', 'password', 'password_confirmation', 'token'
        );
    }
    
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
               ->withInput($request->only('login_id'))
               ->withErrors(['login_id' => trans($response)]);
    }
    
    protected function rules()
    {
        return [
            'token' => 'required',
            'login_id' => 'required',
            'password' => 'required|confirmed',
        ];
    }
}
