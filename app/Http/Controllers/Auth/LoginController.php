<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\HTTP\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request $request)
    {
        $this->validate($request,
        [
            'username' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            // Success
            return redirect()->intended('/panel');
        }
        else
        {
            // Go back on error (or do what you want)
            return redirect()->back();
        }
    }
}
