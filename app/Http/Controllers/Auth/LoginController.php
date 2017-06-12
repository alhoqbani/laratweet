<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectTo()
    {
        return route('user.profile', auth()->user());
    }
    
    protected function credentials(Request $request)
    {
        $login = $request->only($this->username(), 'password');
        $input = filter_var(request('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        return [
            $input     => request('login'),
            'password' => request('password'),
        ];
    }
    
    public function username()
    {
        return 'login';
    }
    
    
}
