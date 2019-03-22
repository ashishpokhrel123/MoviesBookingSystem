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
            <button class="commentbtn btn btn-primary" data-rel="button" >{!! date("d M")!!}</button>  
           
                <script>
                 $(".commentbtn").on("click", function(e) {
                e.preventDefault(); // in some browsers a button submits if no type=
                $("div.commenttod").show();
                $("div.commenttom,div.commenttomnext").hide();
  });
                  </script>
           
           <button class="commentbtn1 btn btn-primary" data-rel="button" >
         
                {!! date("d M",strtotime("tomorrow")) !!}
               
             </button>  
             <script>
                $(".commentbtn1").on("click", function(e) {
               e.preventDefault(); // in some browsers a button submits if no type=
                $("div.commenttom").show();
                $("div.commenttod,div.commenttomnext").hide();
              
 });
                 </script>
            <button class="commentbtn2 btn btn-primary" data-rel="button" >
                {!! date("d M",strtotime("+2 days")) !!}
            </button>  
            <script>
                $(".commentbtn2").on("click", function(e) {
               e.preventDefault(); // in some browsers a button submits if no type=
                $("div.commenttomnext").show();
                $("div.commenttom,div.commenttod").hide();
              
 });
                 </script>
                    <hr>
                  
                    <div id="createcomment" class="commenttod" data-theme="a" style="display:none; margin-top:50px;" >
                        @foreach($shows as $key=>$sh)
                        <div class="time" style="">
        
                        <a href="{{url('/chooseseat',$sh->show_id)}}/{{$movies->mov_id}}">{{ $sh->show_time}}</p>
                        </div>
                        @endforeach
                         </div>

                         
                    <div id="createcomment" class="commenttom" data-theme="a" style="display:none; margin-top:50px;" >
                      <p>hi</p>
                         </div>
                
                         <div id="createcomment" class="commenttomnext" data-theme="a" style="display:none; margin-top:50px;" >
                            <p>hello</p>
                               </div>
 </div>

@endsection