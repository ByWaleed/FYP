@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif

<form action="/rooms/editRoom/{{$Room->id}}" method="post" nctype="multipart/form-data">


    {{ csrf_field() }}

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="roomType">Room Type </label>
      <input type="text" class="form-control" id="roomType" name="roomType" value="{{$Room->roomType}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="numOfBed">Number Of Bed </label>
      <input type="number" class="form-control" id="numOfBed" name="numOfBed" value="{{$Room->numOfBed}}" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="roomStatus">Room Status  </label>
      <input type="text" class="form-control" id="roomStatus" name="roomStatus"  value="{{$Room->roomStatus}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="roomNum">Room Number </label>
      <input type="text" class="form-control" id="roomNum" name="roomNum" value="{{$Room->roomNum}}" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="price">Price</label>
      <input type="number" class="form-control" id="price" name="price" min="1" value="{{$Room->price}}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="numGuest">Number of Guest</label>
      <input type="number" class="form-control" id="numGuest" name="numGuest" min="1" value="{{$Room->numGuest}}" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Update Room</button>
</form>
  @endsection
