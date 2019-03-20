@extends('adminlayouts.adminlayout')
@section('title')  Create  @stop
@section('content')
<div class="container">
    
                    <form class="well form-horizontal" action="{!! url('/addscreen') !!}" method="POST" enctype="multipart/form-data" id="addmovie">
                        @if(session()->has('success'))
                        <div class="alert-success">
                            <h1> {!! session()->get('success') !!}</h1>
                        </div>
                    @endif
                
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error  }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <fieldset>
                                  <legend><center>  <h2> Add new Screen</h2></center></legend>

                    @csrf

             
                    <div class="form-group">
                        <label for="screen">Screen*</label>
                        <input type="text" class="form-control" placeholder="Enter screen name" name="screenname">
                    </div>        
                               
                           
                        
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                </form>
            </div>
       
   
@endsection
