@extends('adminlayouts.adminlayout')
@section('title')  Create  @stop
@section('content')
<div class="container">
    
                    <form class="well form-horizontal" action="{!! url('/addhall') !!}" method="POST" enctype="multipart/form-data" id="addmovie">
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
                                  <legend><center>  <h2> Add new hall</h2></center></legend>

                    @csrf

                                
                                   
                                     
                             
                               
                                <div class="form-group">
                                       
                                    <label for="movie_lang">Screen *</label>
                                    <div class="input-group selectmovie">
                                    <select class="custom-select" id="inputGroupSelect01" name="screen">
                                            <option >--Select Screen--</option>
                                           <!-- if($movie->count())  <!--$movie is object-->
                                           @foreach($scr as $screen)   
                                        
                                        <option value="{{$screen->screen_id}}">{{ $screen->screen_type }}</option>
                                        @endforeach
                                        
                                       
                                      </select>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                       
                                <label for="movie_lang">Show  *</label>
                                <div class="input-group selectmovie">
                                <select class="custom-select" id="inputGroupSelect01" name="show">
                                        <option >--Select show--</option>
                                       <!-- if($movie->count())  <!--$movie is object-->
                                       @foreach($show as $sh)   
                                    
                                    <option value="{{$sh->show_id}}">{{ $sh->show_id}}</option>
                                    @endforeach
                                    
                                   
                                  </select>
                            </div>
                        </div>
             
                 

                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                </form>
            </div>
       
   
@endsection
