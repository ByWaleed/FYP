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
  <form action="storeRoom" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><strong>Room Details</strong></div>
            <div class="card-body card-block">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="roomType">Room Type </label>
                  <input type="text" class="form-control" id="roomType" name="roomType" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="numOfBed">Number Of Bed </label>
                  <input type="number" class="form-control" id="numOfBed" name="numOfBed" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="roomStatus">Room Status  </label>
                  <input type="text" class="form-control" id="roomStatus" name="roomStatus"  required>
                </div>
                <div class="form-group col-md-6">
                  <label for="roomNum">Room Number </label>
                  <input type="text" class="form-control" id="roomNum" name="roomNum" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" min="1" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="numGuest">Number of Guest</label>
                  <input type="number" class="form-control" id="numGuest" name="numGuest" min="1" required>
                </div>
              </div>   
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Add new Room</button>   
                  </div>        
                </div>
              </div>                     
            </div>
          </div>
        </div>
     
            <!-- finish reservation form-->       
    </form>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover table-bg-color-chkout">
    <thead>
      <tr>
        <th>Room Number</th>
        <th>Room Type</th>
        <th>Number Of Bed</th>
        <th>Room Status</th>
        <th>Price</th>
        <th>Number of Guest</th>
        <th colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
          @foreach($Rooms as $room)
      <tr>
        <td>{{ $room->roomNum }}</td>
        <td>{{$room->roomType }}</td>
        <td>{{$room->numOfBed}}</td>
        <td>{{$room->roomStatus}}</td>
        <td>{{ $room->price }}</td>
        <td>{{ $room->numGuest }}</td>
         <td><a href="{{url('rooms/editRoomForm/'.$room->id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{url('rooms/removeRoom/'.$room->id)}}" class="btn btn-danger">Remove</a></td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>




  @endsection

