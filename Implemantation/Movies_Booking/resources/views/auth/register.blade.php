@extends('layouts.app')
@section('title') Register @stop

@section('content')

<div class="container-fluid" style="background-color:aliceblue;">
    <!-- Error message display!-->
    @if($errors->any())
     <div class="alert alert-danger">
        <ul class="list-unstyled">
          @foreach($errors->all() as $error)
          <li>{{ $error}}</li>
         @endforeach
      </ul>
  </div>
  @endif
    <!--  form started !-->

    <div class="row justify-content-center">
        <div class="col-md-8">
            
;
                <div class="card-body" id="registercard">
                    <h1><legend><center>{{ __('Register') }}</legend></h1>
                    <form method="POST" action="/register">
                        @csrf

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Name*" class="text-line {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Address*" class="text-line {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="email" placeholder="Email*" class="text-line {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Phone*" class="text-line {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="">
                        </div>
                    </div>
                        
                        
                      <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                
                                    <div class="form-group">
                                        <input type="password" placeholder="Password*" class="text-line {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="">
                                    </div>
                                </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" placeholder="Confirm Password" class="text-line {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" value="">
                                </div>
                            </div>
                            <div class="col-md-offset-1 ">
								@if ($errors->has('password'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    </span>
                                    @endif
                                </div>
                        </div>
                    </div>
                        
                       <legend><center> <input type="submit" value="Register" class="btn btn btn-primary"></center></legend>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

