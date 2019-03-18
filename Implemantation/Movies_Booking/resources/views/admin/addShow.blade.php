@extends('adminlayouts.adminlayout')
@section('title')  Create  @stop
@section('content')
<div class="container">
    
                    <form class="well form-horizontal" action="{!! url('/addShow') !!}" method="POST" enctype="multipart/form-data" id="addmovie">
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
                                  <legend><center>  <h2> Add new Show</h2></center></legend>

                    @csrf

                    <div class="form-group">
                            <label for="email">show date *</label>
                            <div class="input-group date" data-date-format="dd.mm.yyyy">
                                    <input  type="text" class="form-control" placeholder="M d ,yyy" name="showdate">
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                  <script type="text/javascript">
                                    $('.input-group.date').datepicker({format: "M d ,yyyy"}); 
                                    </script>
                               
                           
                        </div>
                               
                                <div class="form-group">
                                        <label for="email">show time *</label>
                                <div class="input-group timepicker">
                                        
                                        <input type="time" class="form-control" value="09:30" name="showtime">
                                        <div class="input-group-addon" >
                                                <span class="glyphicon glyphicon-th"></span>
                                              </div>
                                            </div>
                                        
                                        
                                    </div>
                                
                                   
                                     
                                <div class="form-group">
                                       
                                        <label for="movie_lang">Movie  *</label>
                                        <div class="input-group selectmovie">
                                        <select class="custom-select" id="inputGroupSelect01" name="movies">
                                                <option >--Select Movie--</option>
                                               <!-- if($movie->count())  <!--$movie is object-->
                                               @foreach($movie as $movies)   
                                            
                                            <option value="{{$movies->mov_id }}">{{ $movies->mov_title }}</option>
                                            @endforeach
                                            
                                           
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                       
                                        <label for="movie_lang">Rate *</label>
                                        <div class="input-group selectmovie">
                                        <select class="custom-select" id="inputGroupSelect01" name="rate">
                                                <option value="185" >185</option>
                                                <option value="285" >285</option>
                                                <option value="385" >385</option>
                                                   
                                    
                                           
                                          </select>
                                    </div>
                                </div>
                              
                 

                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                </form>
            </div>
       
   
@endsection
