<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectionController extends Controller
{
    public function redirection(){
        if(auth()->user())
        {
            if(auth()->user()->roles == 1){
                return redirect('/dashboard');
            }
            if(auth()->user()->roles == 2){
                return redirect('/dashboard');
            }
            if(auth()->user()->roles == 3){
                return redirect('/dashboard');
            }

        }
        else{
            redirect('/login');
        }
    }
}
