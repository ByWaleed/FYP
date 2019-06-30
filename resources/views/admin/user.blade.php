
@extends('layouts.app')
@section('content')

<form action="/admin/updateUserDetails/{{$users->id}}" method="post" nctype="multipart/form-data">

    {{ csrf_field() }}

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fullname">Full name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" value="{{$users->fullname}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="email">email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{$users->email}}" required>
    </div>
  </div> 
  <button type="submit" class="btn btn-primary">submit</button>
</form>
<br>
<br>

<form action="/admin/updateUserPassword/{{$users->id}}" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div> 
  <button type="submit" class="btn btn-primary">submit</button>
</form>
<br>
<br>
<form action="/admin/removeUser/{{$users->id}}" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Delete Account</button>
</form>
@endsection
