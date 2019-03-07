@extends('layouts.app')
@section('title') Login @stop

@section('content')

<div class="container-fluid" id="logincontainer">
    <!-- Success Message display !-->
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{{ session()->get('success') }}}
        </div>
        @endif
    <div class="row justify-content-center">
            <div class="card" id="logincard">
                    <div class="form-group row">
                         
                            <div class="clearfix">

        <legend><center>  {{ __('Login') }}</center></legend>
        <form method="POST" action="{{ route('login') }}">
            @csrf
                        <div class="card-body">

                        
                            <label for="username" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                    <input type="email" placeholder="email" class="text-line {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="text-line {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <legend><center><input type="submit" value="  {{ __('Login') }}" class="btn btn btn-primary"></center></legend>

                               
                                <div class="col-md-8 col-md-offset-2"><a href="/reset-password">Forgot your password?</a>
                            </div>
                                 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>
            
   
@endsection
