<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screen;
use App\Show;
use DB;

class ScreenController extends Controller
{
    public function create()
    {
        return view('admin.addscreen');
    }
    public function show()
    {
        $scr=  DB::table('screen')
        ->select('screen.screen_type','screen.screen_id')
        ->get();

        $show=  DB::table('shows')
        ->select('show_id')
        ->get();
       
        return view('admin.addhall', compact(['scr', 'show']));

    }
    public function store(Request $request)
    {
        $this->validate(request(),[
            'screenname'=>'required',
           
        ]);

        $scr=new Screen();
        $scr->screen_type=$request->screenname;

        $scr->save();
        return redirect()->to('/addscreen')->with('success','Screen added succesfully');

    }

}
