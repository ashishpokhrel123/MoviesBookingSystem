@extends('adminlayouts.adminlayout')
@section('title')  Create  @stop
@section('content')
<div class="container">
    
    <form class="well form-horizontal" action="{!! url('/addmovie') !!}" method="POST" enctype="multipart/form-data" id="addmovie">
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
                                  <legend><center>  <h2> Add new Movie</h2></center></legend>

                    @csrf
                    <div class="form-group">
                        <label for="email">Movie Title *</label>
                        <input type="text" class="form-control" placeholder="Enter Movie Title" name="movies_title">
                    </div>
                    <div class="form-group">
                            <label for="email">Director *</label>
                            <input type="text" class="form-control" placeholder="Enter Movie Title" name="movies_director">
                        </div>
                        <div class="form-group">
                                <label for="email">Cast *</label>
                                <input type="text" class="form-control" placeholder="Enter Movie Title" name="movies_cast">
                            </div>
                            <div class="form-group">
                            <label for="email">Movie type *</label>
                            
                            <div class="checkbox" name="movies_type[]">
                                    <label class="checkbox-inline"><input type="checkbox" name="movies_type[]" value="Action">Action</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="movies_type[]" value="Comedy">Comedy</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="movies_type[]" value="Thriller">Thriller</label><br>
                                    <label class="checkbox-inline"><input type="checkbox"  name="movies_type[]"value="Romance">Romance</label>
                                     <label class="checkbox-inline"><input type="checkbox" name="movies_type[]" value="Horror">Horror</label>
                                     <label class="checkbox-inline"><input type="checkbox"  name="movies_type[]" value="Biography">Biography</label>
                                     <label class="checkbox-inline"><input type="checkbox"  name="movies_type[]"value="Sci-Fi">Sci-Fi</label>
                                     <label class="checkbox-inline"><input type="checkbox"  name="movies_type[]"value="Adventure">Adventure</label>
                                  </div>
                            </div>
                        <div class="form-group">
                                <label for="movie_lang">Movie langauge *</label>
                                <select class="custom-select" id="inputGroupSelect01" name="movies_lang">
                                    <option selected>Choose Language</option>
                                    <option value="Nepali">Nepali</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                    <label for="email">show date *</label>
                                    <div class="input-group date" data-date-format="dd.mm.yyyy" >
                                            <input  type="text" class="form-control" placeholder="M d ,yyy" name="movies_realase">
                                            <div class="input-group-addon" >
                                              <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                          </div>
                                        <script type="text/javascript">
                                        $('.input-group.date').datepicker({format: "M d ,yyyy"}); 
                                        </script>
                                       
                                   
                                </div>
                                <div class="form-group">
                                        <label for="email">Duration *</label>
                                        <input type="h-m-s"  class="form-control" placeholder="Enter Movie hrs" name="movies_duration">
                                       
                                    </div>
                    <div class="form-group">
                        <label for="pwd">Poster*</label>
                        <input type="file" class="form-control" name="movies_poster">
                    </div>
                    <div class="form-group">
                            <label for="pwd">Movies uRL Link</label>
                            <input type="text" class="form-control" placeholder="enter movies url" name="movies_url">
                        </div>
                    <div class="form-group">
                        <label for="email">Description</label>
                        <textarea  placeholder="Enter description of movie" class="form-control" name="descrption" rows="3">
                </textarea>
                    </div>

                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                </form>
            </div>
       
   
@endsection