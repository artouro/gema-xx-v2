<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/d';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticate(){
        $credentials = [
            'userid' => $email,
            'password' => $password
        ];
        if (Auth::guard('web')->attempt($credentials)) {
            $details = Auth::guard('user')->user();
            $user = $details['original'];
            return $user;
        } if (Auth::guard('peserta')->attempt($credentials)) {
            $details = Auth::guard('admin')->user();
            $user = $details['original'];
            return $user;
        } else {
            return 'auth fail';
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
        return view('login');
    }
    protected function getFailedLoginMessage(){
        return 'Email/Password salah';
    }
}
