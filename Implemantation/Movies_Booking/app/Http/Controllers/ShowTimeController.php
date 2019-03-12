<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie;
use App\Show;

class ShowTimeController extends Controller
{
    public function movie($id)
    {
        
        $movie = DB::table('movies')
       ->join('shows', 'movies.mov_id', '=','shows.show_id')   //*join query*/
     ->select('movies.mov_title')
       ->where('movies.mov_id',$id)
       ->get();

       echo "<pre>";
       print_r($movie);
       exit();

    // return view('customers.showtime')->with('movies', $movie);
        
    }
}
