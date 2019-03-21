<?php

namespace App\Http\Controllers;
use App\Hall;
use  App\Screen;
use Illuminate\Http\Request;

use Auth;
use DB;

class HallController extends Controller
{
    public function create()
    {
        return view('admin.addhall');
    }
    public function seat($id)
    {
        if(Auth::check())
        {
            $hall=DB::table('hall')
            ->join('screen', 'screen.screen_id', '=','hall.screen_id')   //*join query*/
         ->select('screen.screen_type')
           ->where('hall.show_id',$id)
           ->get();
            return view('customers.chooseseat',['hall' => $hall]);
        }
      
        else
        {
                  return view('auth.login');
        }

   
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
