@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif


        <div class="content mt-3">
            <div class="animated fadeIn" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                    <div class="table-responsive-sm">     
                    <div class="card-header"><strong>Housekeeping Report</strong></div>       
                      <div class="card-body">
                          <table class="table table-bordered table-hover table-bg-color-chkout">
                              <thead>
                                  <tr>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Room Status</th>
                                    <th>Comments</th>
                                    <th class="text-center">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($findRooms as $room)
                                <tr>
                                  <td>{{ $room->roomNum }}</td>
                                  <td>{{$room->roomType }}</td>
                                  <td>{{$room->roomStatus}}</td>
                                  <td>{{$room->comments}}</td>
                                   <td><a href="{{url('rooms/editHouseKeeping/'.$room->id)}}" class="btn btn-primary">Edit</a></td>
                                </tr>
                                  @endforeach                                         
                              </tbody>
                          </table>
                      </div>                        
                    </div>
                  </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
  @endsection




