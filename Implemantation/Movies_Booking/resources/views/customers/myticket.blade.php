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
                                <form action="{!! url('') !!}" method="POST">
                                        @csrf
                                <a href="{!! url('ticket',$books->book_id) !!}" type="button" class="btn btn-success btn-sm">View Ticket</a>
                            
                                {!! method_field('DELETE') !!}
                                <a href="" type="button" class="btn btn-danger btn-sm" style="margin-left:5px;">Cancel Booking</a>
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