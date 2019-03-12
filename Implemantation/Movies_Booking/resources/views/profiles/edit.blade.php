@extends('layouts.app')
@section('title') Update Profile @stop

@section('content')

<div class="container-fluid" style="background-color:aliceblue;">
    <!-- Error message display!-->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{!! session()->getsuccess()!!}}
    </div>
    @endif
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
            

                <div class="card-body" id="registercard">
                    <h1><legend><center>{{ __('Update') }}</legend></h1>
                    <form method="POST" action="{!! url('/editprofile',Auth::user()->id) !!}">
                        @csrf
                        {!! method_field('put')!!}
                        


                        
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Name*" class="text-line {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{!!(Auth::user()->name)!!}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Address*" class="text-line {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{!!(Auth::user()->address)!!}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="email" placeholder="Email*" class="text-line {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{!!(Auth::user()->email)!!}" readonly>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Phone*" class="text-line {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{!! (Auth::user()->phone)!!}">
                        </div>
                    </div>
                        
                        
                      <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                
                                    <div class="form-group">
                                        <input type="password" placeholder="Password*"class="text-line {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{!! (Auth::user()->password)!!}">
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
                        
                       <legend><center> <input type="submit" value="Update" class="btn btn btn-primary"></center></legend>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

