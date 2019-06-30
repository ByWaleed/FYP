@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form action="{{ url('/admin/createNewUser') }}" method="POST" aria-label="{{ __('Register') }}">
                      {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Full name') }}</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jobRole" class="col-md-4 col-form-label text-md-right">{{ __('Access rights') }}</label>
                            <div class="col-md-6">
                                <select  name="jobRole" id="jobRole">
                                  <option value="Admin">Admin</option>
                                  <option value="Receptionist">Receptionist</option>
                                  <option value="Cleaner">Cleaner</option>
                                </select>
                            </div>
                        </div>

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

                        <div class="form-group row">
                            <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contactNumber" type="contactNumber" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" value="{{ old('contactNumber') }}" required>

                                @if ($errors->has('contactNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contactNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="doorNum" class="col-md-4 col-form-label text-md-right">{{ __('Door Number') }}</label>

                            <div class="col-md-6">
                                <input id="doorNum" type="doorNum" class="form-control{{ $errors->has('doorNum') ? ' is-invalid' : '' }}" name="doorNum" value="{{ old('doorNum') }}" required>

                                @if ($errors->has('doorNum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('doorNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="streetName" class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                            <div class="col-md-6">
                                <input id="streetName" type="streetName" class="form-control{{ $errors->has('streetName') ? ' is-invalid' : '' }}" name="streetName" value="{{ old('streetName') }}" required>

                                @if ($errors->has('streetName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('streetName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postcode" type="postcode" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode') }}" required>

                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NINum" class="col-md-4 col-form-label text-md-right">{{ __('NINum') }}</label>

                            <div class="col-md-6">
                                <input id="NINum" type="NINum" class="form-control{{ $errors->has('NINum') ? ' is-invalid' : '' }}" name="NINum" value="{{ old('NINum') }}" required>

                                @if ($errors->has('NINum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('NINum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
