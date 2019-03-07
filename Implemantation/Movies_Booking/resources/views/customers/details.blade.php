@extends('layouts.app')
@section('title') Movie detail @stop

@section('content')
<div class="container">
<h1>Movie Detail</h1>
<hr>
@if($movie->count())
 @foreach($movie as $key=>$movies)
 <div class="row">
<div class="col-sm-6">
<iframe width="520" height="315" margin-left="300px"
src="http://www.youtube.com/embed/{{ $movies->mov_url }}">
</iframe>
</div>
<div class="col-sm-6">
<h1>{{$movies->mov_title}}</h1>
<p style="color:red">{{$movies->mov_type}}</p>
<p>{{$movies->mov_description}}</p>
<p>Director:{{$movies->mov_director}}</p> 
<p>Cast:{{$movies->mov_cast}}</p>
<p>Realase Date:{{$movies->mov_realsedate}} </p>
<p>Duration:{{$movies->mov_duration}}</p>
</div>
</div>
@endforeach
@endif
</div>

@endsection