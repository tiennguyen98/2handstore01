<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    protected function login(Request $request)
    {
        $this->validateLogin($request);
        
        // $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if (!Auth::user()->verified()) {
                Auth::logout();

                return redirect()->back()->withErrors(['verify' => trans('auth.verify')]);
            }
        }
        
        return $this->sendFailedLoginResponse($request);
    }
}
