@extends('adminlayouts.adminlayout')
@section('title')Admin-Home @endsection
@section('content')
<div class="container">
    <div class="movielist" style="margin-left:150px;">
    <h2>List of all movies</h2>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{{ session()->get('success') }}}
        </div>
    @endif

    

    <a href="{!! url('addMovie') !!}" type="button" class="btn btn-info btn-sm float-right mb-2">Add New </a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SN.</th>
            <th>mov_title</th>
            <th>mov_director</th>
            <th>mov_type</th>
            <th>mov_lang</th>
            <th>mov_poster</th>
            <th>mov_url</th>
            <th>mov_description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            

        @if($movie->count())
            @foreach($movie as $key=>$movies)
                <tr>
                    <td>{!! $key + 1 !!}</td>
                    <td>{!! str_limit($movies->mov_title,60) !!}</td>
                    <td>{!! $movies->mov_director !!}</td>
                    <td>{!! $movies->mov_type !!}</td>
                    <td>{!! $movies->mov_lang !!}</td>
                    
                    <td>
                        @if($movies->image)
                        <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail"
                        style="height:100px;width:100px;">
                    @else
                        <span class="badge badge-danger">  No Image Found </span>
                    @endif
                    </td>
                    <td>{!! $movies->mov_url !!}</td>
                    <td>{!! str_limit($movies->mov_description,1500)!!}</td>
                   

                  
                    <td style="float:left;">
                        <a href="{!! url('/editmovies',$movies->mov_id) !!}" type="button" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{!! url('deletemovie',[$movies->id]) !!}" method="POST">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        @else
            <tr>
                <td colspan="4"> No record found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
</div>
@endsection