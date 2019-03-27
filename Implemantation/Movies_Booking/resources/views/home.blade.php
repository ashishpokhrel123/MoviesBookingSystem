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
        <div class="clearfix"></div>
        <h1>Now Showing</h1><hr>
 

        <div class="container">
            <div class="row">
                    @foreach($movie as $movies)
                <div class="col-md-4">
                    <div class="movies">
                        @if($movies->image)
                            <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail" id="movies_image"
                            style="height:300px;width:300px;">
                    
                            <div class="bottomright"><a href="{{url('/showtime',$movies->mov_id)}}"><img src="{{url('images/ticket.png')}}" alt="logo" style="height:50px;width:50px;margin-top:10px;"></a></div>                
                        @else
                            <span class="badge badge-danger">  No Image Found </span>
                        @endif 
                        <div class="overlay">
                                    
                        </div>
                        <div class="button"><a href="{{url('/moviedetail',$movies->mov_id)}}">{{ __('Details') }}</a></div>       
                        <div class="title">
                            {{$movies->mov_title}}
                        </div>  
                    </div> 
                </div>
                @endforeach   
            </div>
        </div>
             
    </div>
@endsection
