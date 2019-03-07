<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    
    public function show()
    {
        $shows=new Show();
        $shows=$shows->get();
        return view('customers.showtime',[
            'shows'=>$shows
        ]);
    }
}
