<?php

namespace App\Http\Controllers;
use App\Show;

use Illuminate\Http\Request;

class ShowDetailController extends Controller
{
    public function show()
    {
        $shows=new Show();
        $shows=$shows->get();
        return view('customers.showtime',[
            'shows'=>$shows
        ]);
    }

    public function showtime($id)
    {
        $shows = DB::table('shows')
        ->join('movies', 'movies.mov_id', '=','shows.mov_id')   //*join query*/
      ->select('shows.show_time','movies.mov_duration')
        ->where('movies.mov_id',$id)
        ->get();
 
      return view('home')->with('show', $shows);
             
         
    }
}
