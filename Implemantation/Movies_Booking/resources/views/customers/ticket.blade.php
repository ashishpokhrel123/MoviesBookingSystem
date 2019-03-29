@extends('layouts.app')
@section('title') Print Ticket @stop

@section('content')
<div class="container">
     <div class="tic" style="height:450px;width:400px; background-color:aquamarine;margin-left:400px;text-align:center">
        <legend><center>  <img src="{{url('images/logo.png')}}" alt="logo"></center></legend>
          @foreach($books as $bk)
             <p style="text-align:right"> BookDate:{!! date("D,M,Y")!!}</p>
             <p>Movies name  : {!!$bk->mov_title!!}</p>
             <p>Screen       :      {!!$bk->screen!!}</p>
             <p>Seat info    :  {!!$bk->book_seats!!}</p>
             <p>Show datetime: {!!$bk->show_date!!}   {!!$bk->show_time!!}</p>
             <p>Totprice     :{!!$bk->totprice!!}</p>
      @endforeach   
    </div>
         <div class="panel-heading">
            <button class="btn btn-sm pull-right btn-default">Print Ticket</button>
                <script>
                   $("button").click(function () {
                     print()
                   });
                </script>
    </div>
</div>

@endsection