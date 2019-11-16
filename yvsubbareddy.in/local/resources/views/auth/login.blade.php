@extends('layouts.master')

@section('content')
<div class="container">
            <div class="pg-container" style="margin-bottom: 160px;">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-xs-12 col-sm-12">
                        <h4 class="abt-title mt-4">Log in</h4>
                        <div class="forgot-block">
                            
                                <form class="form-horizontal mt-2" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-3 text-align-right">
                                        User Email 
                                    </div>
                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 text-align-right">
                                        Password 
                                    </div>
                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                            <div class="col-md-3 text-align-right">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                                    <div class="col-md-3 text-align-right"><button type="submit" class="btn btn-primary">
                                    Login
                                </button></div>
                                    <div class="col-md-9 button-link"> 
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
@endsection
