@extends('layouts.app2')

@section('content')


<div class="login-form bgcol" >
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
      {{ csrf_field() }}
        <div class="avatar text-center">
           <!-- <li class="text-center"><span class="avatar avatar-64 img-circle  bg-primary">E</span></li>-->
            <div class="img"><img src="{{asset('images/loginAvartar.jpg')}}" class="img-fluid img-thumbnail mx-auto" alt="..."></div>
            
        </div>

        <h2 class="text-center"></h2>  

        <div class="form-group">    
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif            
        </div>

        <div class="form-group">         
           
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
           
        </div>

        <div class="clearfix">            
            
                <label class="pull-left checkbox-inline" for="remember">
                 <input type="checkbox" class="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
                      
        </div>
        
       <div class="form-group">
            <button type="submit"  class="btn btn-primary btn-lg btn-block">
                {{ __('Login') }}
            </button>
        </div>      
        
    </form>
</div>
              







@endsection
