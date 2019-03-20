<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
use DB;

class SeatController extends Controller
{
    public function seat($id)
    {

        $scr=DB::table('hall')
        ->join('screen', 'screen.screen_id', '=','hall.screen_id')   //*join query*/
     ->select('screen.screen_type')
       ->where('hall.show_id',$id)
       ->get();


        return view('customers.chooseseat', compact([ 'scr']));
    }
}
