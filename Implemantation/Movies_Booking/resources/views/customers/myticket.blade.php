@extends('layouts.app')
@section('title') Movie detail @stop

@section('content')
<div class="container">
        <h2>My Ticket</h2>
             @if(session()->has('success'))
               <div class="alert alert-success">
                  {{{ session()->get('success') }}}
               </div>
          @endif
             <a href="{!! url('') !!}" type="button" class="btn btn-info btn-sm float-right mb-2"> </a>
               <table class="table table-bordered">
               <thead>
            <tr>
                <th>SN.</th>
                <th>Movie name</th>
                <th>Date</th>
                <th>Showtime</th>
                <th>Total seat</th>
                <th>Total price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if($book->count())
                @foreach($book as $key=>$books)
           
                    <tr>
                    <td>{!! $books->book_id!!}</td>
                        <td>{!! $books->mov_title!!}</td>
                        <td>{!! $books->show_date!!}</td>
                        <td>
                            {!! $books->show_time!!}
                        </td>

                        <td>{!! $books->book_seats!!}</td>
                        <td>{!! $books->totprice!!}</td>


                        <td>
                                
                          
                                <a href="{{url('ticket',$books->book_id)}}" type="button" class="btn btn-success btn-sm">View Ticket</a>
                                <a href="{{url('editbooking',$books->book_id)}}/{{$books->show_time}}" type="button" class="btn btn-primary btn-sm">Edit Booking</a>
                                <form action="{!!url('/myticket',$books->book_id)!!}" method="POST">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="7"> <p style="color:red">No Movie Book yet</p></td>
                        </tr>
                    @endif
          
            </tbody>
        </table>
    </div>

@endsection