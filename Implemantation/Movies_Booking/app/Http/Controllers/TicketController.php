<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{
    public function create()
    { 
           if(Auth::check())
           {
            return view('customers.myticket');
           }
           else
           {
               return view ('auth.login');
           }
        
    }
}
