@extends('layouts.app')
@section('content')
       
        @if(session('updatedDatabase'))
        <div class="alert alert-danger"> {{session('updatedDatabase')}} </div>
        @endif

  <div class="col-lg-12">
    <div class="card">
      <div class="card-header"><strong>Results</strong></div>
      <div class="card-body card-block">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-bg-color-chkout">
          <thead>
            <tr>              
              <th>FirstName</th>
              <th>Last name</th>
              <th>checkin</th>
              <th>checkout</th>
              <th>Status</th>
              <th>numRooms</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                @foreach($reservations as $re)
            <tr>
              <td>{{$re->firstname}}</td>
              <td>{{$re->lastname}}</td>
              <td>{{$re->checkin }}</td>
              <td>{{$re->checkout }}</td>
              <td>{{$re->reservationStatus }}</td>
              <td>{{$re->numRooms }}</td>

              @if($re->reservationStatus != "inhouse" )
                <td><a href="{{ url('checkinForm/'.$re->id)}}" class="btn btn-primary btn-sm">View Details</a></td>
              @else
              <td><a href="{{url('rooms/getCheckout/'.$re->resId)}}" class="btn btn-primary btn-sm">View Details</a></td>
              @endif
              
            </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    </div>
          </div>
        </div>
    @endsection
