<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    //protected $redirectTo = '/home';
    public function redirectTo(){
        
        // User role
        $role = Auth::user()->usertype; 
        
        // Check user role
        /*switch ($role) {
            case '0':
                    return '/home';
                break;
            case '1':
                    return '/adminDashboard';
                break; 
            default:
                    return '/login'; 
                break;
        }*/
        if($role==1)
        {
            return '/adminDashboard';

        }
        else{
            return '/home';
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
