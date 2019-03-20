@extends('layouts.app')
@section('title')showtime @endsection

@section('content')
<div class="container">
                <ul style="font-size:20px;">
                    @if(!empty($movie))
                        @forelse($movie as $movies)
                        {{ $movies->mov_title}}<br/>
                        {{ $movies->mov_duration}}
                        <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail" id="movies_img"
                  style="">
                        @empty
                            <li>No data found</li>
                        @endforelse
                    @endif
                </ul>
            </li>
          <div class="st" style="margin:80px">
            <hr>
                    <legend><center><h1>Showtime</h1></center></legend>
                    <hr>
                    @foreach($shows as $key=>$sh)
                    <div class="time" style=" border:1px solid red;float:left;margin-left:20px;border-radius:2em">
  
                    <a href="{{url('/seat',$sh->show_id)}}">{{ $sh->show_time}}
                                
                    </div>
                @endforeach
                
 </div>

@endsection