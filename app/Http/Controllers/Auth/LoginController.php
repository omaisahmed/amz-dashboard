<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
     protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo;

    // public function redirectTo() {
    //     $role = Auth::user()->role; 
    //     switch ($role) {
    //       case 'Super Admin':
    //         return '/superadmin';
    //         break;
    //       case 'Admin':
    //         return '/admin';
    //         break; 
    //       case 'Client':
    //         return '/client';
    //         break;
    //       default:
    //         return '/'; 
    //       break;
    //     }
    //   }

    // public function redirectTo()
    // {
    //     switch(Auth::user()->role){
    //         case 'Super Admin':
    //             $this->redirectTo = '/superadmin';
    //             return $this->redirectTo;
    //             break;
    //         case 'Admin':
    //             $this->redirectTo = '/admin';
    //             return $this->redirectTo;
    //             break;
    //         case 'Client':
    //             $this->redirectTo = '/client';
    //             return $this->redirectTo;
    //             break;
    //         default:
    //             $this->redirectTo = '/';
    //             return $this->redirectTo;
    //     }
    // }

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
