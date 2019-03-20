<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;

class HallController extends Controller
{
    public function create()
    {
        return view('admin.addhall');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'screen'=>'required',
            'show'=>'required'
           
        ]);

        $hall=new Hall();
        $hall->screen_id=$request->screen;
        $hall->show_id=$request->show;

        $hall->save();
        return redirect()->to('/addhall')->with('success','Hall added succesfully');

    }
}
