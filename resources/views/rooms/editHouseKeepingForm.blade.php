@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif





<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        <!--form started-->
        <form action="/rooms/saveHouseKeeping/{{$findRoom->id}}" method="post" nctype="multipart/form-data">

        {{ csrf_field() }}
                        
            <!--Start of customer  details-->
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header"><strong>Room Details</strong></div>
                    <div class="card-body card-block">
                       <div class="row">
                        <div class="form-group col-md-6">
                          <label for="roomType">Room Type </label>
                          <input type="text" class="form-control" id="roomType" name="roomType" value="{{$findRoom->roomType}}" required readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="roomStatus">Room Status  </label>
                          <input type="text" class="form-control" id="roomStatus" name="roomStatus" value="{{$findRoom->roomStatus}}"  required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="roomNum">Room Number </label>
                          <input type="text" class="form-control" id="roomNum" name="roomNum" value="{{$findRoom->roomNum}}" required readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="comments">Comments  </label>
                          <input type="text" class="form-control" id="comments" name="comments" value="{{$findRoom->comments}}"  required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Update</button>   
                          </div>        
                        </div>
                        </div>
                    </div>                    
                </div>
                    <!-- finish customer  form-->
            </div>         
        </form>
    </div>
</div>
  @endsection




