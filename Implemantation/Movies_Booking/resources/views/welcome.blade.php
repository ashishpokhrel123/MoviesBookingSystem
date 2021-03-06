@extends('layouts.app')
@section('title')Home @endsection

@section('content')
<div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{{ session()->get('success') }}}
        </div>
        @endif
    <div class="container-fluid">
        
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{url('images/first.jpg')}}" alt="First slide" style="height:300px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('images/second.jpg')}}" alt="Second slide" style="height:300px;">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('images/third.jpg')}}" alt="Third slide" style="height:300px;">
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            <div class="row" style="margin:20px;padding:15px;">  <h1>Now Showing</h1>   <h1>Upcomming Movies</h1></div>
            <hr>
            
            <div class="movies1">
               
                    @if($movie->count())
                @foreach($movie as $key=>$movies)

               
                @if($movies->image)
                <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail" id="movies_image"
                style="height:400px;width:300px">
            @else
                <span class="badge badge-danger">  No Image Found </span>
                
            @endif
            <div class="bottom-right">Bottom Right</div>
               
                <div class="overlay">
                  
                   </div>
                   <div class="button"><a href="{{url('/moviedetail',$movies->mov_id)}}"></a></div>
                   
                      
               
                <style>
                  </style>
                  
            </div>
            <div class="info">
              {{$movies->mov_title}}<br/>
              <div class="row">
                  <div class="col-sm-4">{{$movies->mov_type}}</div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4" style="margin-left:-500px"><i class="far fa-clock" style="color:red"></i>{{$movies->mov_duration}}</div>
            
              </div>
            </div>
              <hr style=" margin-left:-10px;width:300px;background-color:black">
             
              @endforeach
                @endif
         
            </div>
            
            <style>
              .logo
              {
                height:300px;
                width:300px;

              }
            </style> 
            <button>Book</button>     
    </div>
    

@endsection