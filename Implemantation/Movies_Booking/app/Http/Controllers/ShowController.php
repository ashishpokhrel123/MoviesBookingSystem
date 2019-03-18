<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Show;
use Illuminate\Http\Request;
use App\Movie;
use Response;





class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    
    }


    public function showtime($id)
    {
       
      
        $shows = DB::table('shows')
       ->join('movies', 'movies.mov_id', '=','shows.mov_id')   //*join query*/
     ->select('shows.show_time','shows.show_date','rate')
       ->where('movies.mov_id',$id)
       ->get();

       $movie=  DB::table('movies')
        ->select('movies.*')
        ->where('mov_id', $id)
        ->get();
    
        return view('customers.showtime', compact(['movie', 'shows']));
      // ->offset(2)
      // ->limit(2)

      
       /*echo "<pre>";
       print_r($shows);
       print_r($movie);
       exit();*/

     /*return view('customers.showtime')->with('shows','movie');*/
            
        
       
    }
  
    public function readRate()
    {
        $shows = DB::table('shows')
        ->select('shows.rate')
        ->get();
   
       return view('customers.chooseseat', compact([ 'shows']));
   // return Response($shows);

    }
    
       
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      
        
        $movie=new Movie();
        $movie=$movie->get();
        return view('admin.addShow',[
            'movie'=>$movie
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'showdate'=>'required',
            'showtime'=>'required',
            'movies'=>'required',
            'rate'=>'required',
        ]);

        $shows=new Show();
        $shows->show_date=$request->showdate;
        $shows->show_time=$request->showtime;
        $shows->mov_id=$request->movies;
        $shows->rate=$request->rate;
        $shows->save();
        return redirect()->to('/addShow')->with('success','ShowDeatils added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
