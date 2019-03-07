@extends('layouts.app')
@section('title')showtime @endsection

@section('content')
<div class="container">
        <div class="moviesshow" style="height:500px;width:500px;">
           

               
            @foreach($movie as $key=>$movies)
           
            @if($movies->image)
            <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail" id="movies_image"
            style="height:200px;width:200px">
        @else
            <span class="badge badge-danger">  No Image Found </span>
        </div>
        <div class="clearfix"></div>

        <div class="movinfo" style=height:200px;width:200px;"">
            {{$movies->mov_title}}
        </div>
            
        
        </div>
        <div class="showdetails">
                
                @foreach($shows as $show)
                       {{$show->show_date}}
                @endforeach
                @endif
        @endforeach
      
                

        </div>
    
</div>

@endsection