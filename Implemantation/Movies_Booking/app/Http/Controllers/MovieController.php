<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Movie;
use Illuminate\Http\Request;




class MovieController extends Controller
{

    protected $image_dir = "uploads/movies";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movie=new Movie();
        $movie=$movie->get();
        return view('home',[
            'movie'=>$movie
        ]);




    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function showdetail($id)
     {
        $movie=  DB::table('movies')
        ->select('movies.*')
        ->where('mov_id', $id)
        ->get();

         return view('customers.details',[
            'movie'=>$movie
         ]);
     }


     public function showmovies($id)
     {
        $movie=  DB::table('movies')
        ->select('movies.*')
        ->where('mov_id', $id)
        ->get();

         return view('customers.showtime')->with('showmovies',$movie);
     }
     public function showtime($id)
     {
         //$movie=Movie::all();
         $shows = DB::table('shows')
        ->join('movies', 'movies.mov_id', '=','shows.mov_id')   //*join query*/
      ->select('shows.show_time')
        ->where('movies.mov_id',$id)


        ->get();


      return view('customers.showtime')->with('shows',$shows);



     }
    public function create()
    {
        return view('admin.addMovie');
    }
    public function uploadfile($file,$dir)
    {
        $file_extension=$file->getClientOriginalExtension();
        $file_name=md5(time()). '.' . $file_extension;
        $file->move($dir,$file_name);
        return $file_name;
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
            'movies_title'=>'required|max:150',
            'movies_director'=>'required|max:150',
            'movies_cast'=>'required|max:150',
            'movies_type'=>'required',
            'movies_lang'=>'required',
            'movies_realase'=>'required',
            'movies_duration'=>'required|max:200',
            'movies_poster'=>'nullable',
            'movies_url'=>'nullable|max:300',
            'descrption'=>'required|max:1500',

      ]);
      //inserting movies in database
         $movie=new Movie();
         if(request()->hasFile('movies_poster')){
          $file_name=$this-> uploadfile(request()->file('movies_poster'),$this->image_dir);
          $movie->image=$file_name;

      }

         $movie->mov_title=$request->movies_title;
         $movie->mov_director=$request->movies_director;
         $movie->mov_cast=$request->movies_cast;
         $movie->mov_type=implode(',',$request->movies_type);
         $movie->mov_lang=$request->movies_lang;
         $movie->mov_realsedate=$request->movies_realase;
         $movie->mov_duration=$request->movies_duration;
       // $movie->image=$image_dir->$file_name;d
         $movie->mov_url=$request->movies_url;
         $movie->mov_description=$request->descrption;
         $movie->save();
         return redirect()->to('/addmovie')->with('success', 'Movie added Succesfully');

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
    public function viewmovie()
    {
        $movie=new Movie();
        $movie = $movie->get();
        return view('admin.viewmovie',[
            'movie'=>$movie
        ]);
    }
    public function edit($id)
    {
        $movie=Movie::find($id);
        return view('admin.editmovies',[
            'movie'=>$movie
        ]);
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
        $this->validate(request(),[
            'movies_title'=>'required|max:150',
            'movies_director'=>'required|max:150',
            'movies_cast'=>'required|max:150',
            'movies_type'=>'required',
            'movies_lang'=>'required',
            'movies_realase'=>'required',
            'movies_duration'=>'required|max:200',
            'movies_poster'=>'nullable',
            'movies_url'=>'nullable|max:300',
            'descrption'=>'required|max:5000',

      ]);
      $movie = Movie::find($id);
      if ($request->hasFile('movies_poster')) {
        if ($movie->image && app('files')->exists($this->image_dir . '/' . $movie->image)) {
            app('files')->delete($this->image_dir . '/' . $movie->image);
        }
        $file_name = $this->uploadFile($request->file('movies_poster'), $this->image_dir);
        $movie->image = $file_name;
      }

    $movie->mov_title=$request->movies_title;
    $movie->mov_director=$request->movies_director;
    $movie->mov_cast=$request->movies_cast;
    $movie->mov_type=implode(',',$request->movies_type);
    $movie->mov_lang=$request->movies_lang;
    $movie->mov_realsedate=$request->movies_realase;
    $movie->mov_duration=$request->movies_duration;
  // $movie->image=$image_dir->$file_name;d
    $movie->mov_url=$request->movies_url;
    $movie->mov_description=$request->descrption;
    $movie->save();
    return redirect()->to('/viewmovie')->with('success', 'Movie Updated  Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
