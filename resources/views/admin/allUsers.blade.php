@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif
  
   <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
      </tr>
    </thead>
    <tbody>
         
      <tr>
         <td><a href="{{url('/admin/createNewUserForm')}}" class="btn btn-primary">New Account</a></td>
      </tr>
        
    </tbody>
  </table>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover table-bg-color-chkout">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
          @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{ $user->fullname }}</td>
         <td><a href="{{url('admin/user/'.$user->id)}}" class="btn btn-primary">Details</a></td>
      </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  @endsection
