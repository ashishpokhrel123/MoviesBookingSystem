@extends('layouts.app')
@section('title') Movie detail @stop
@section('content')
   <div class="container">
      <h1>Movie Detail</h1>
       <hr>

   @foreach($movie as $moviedetail)
            <div class="row">
            <div class="col-sm-6">
           <iframe width="520" height="315" margin-left="300px"
           src="http://www.youtube.com/embed/{{ $moviedetail->mov_url }}">
           </iframe>
    </div>

           <div class="col-sm-6">
                <h1>{{$moviedetail->mov_title}}</h1>
                <p style="color:red">{{$moviedetail->mov_type}}</p>
                <p>{{$moviedetail->mov_description}}</p>
                 <p>Director:{{$moviedetail->mov_director}}</p> 
                 <p>Cast:{{$moviedetail->mov_cast}}</p>
                 <p>Realase Date:{{$moviedetail->mov_realsedate}} </p>
                 <p>Duration:{{$moviedetail->mov_duration}}</p>
                 </div>
          </div>
  @endforeach
</div>
@endsection