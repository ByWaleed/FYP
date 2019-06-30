@extends('layouts.app')
@section('content')

  <!-- Right Panel -->
<ul class="custom nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">In House</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Arrivals</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Checkout</a>
    </li>
</ul>


    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive-sm">
                      <div class="card-body">
                          <table class="table table-bordered table-hover table-bg-color-chkout">
                              <thead>
                                  <tr>
                                      <th>Room</th>
                                      <th>Full Name</th>
                                      <th>Check In</th>
                                      <th>Check Out</th>
                                      <th>Room Type</th>
                                      <th>Num Of Nights</th>
                                      <th>Amount</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($getInHouse as $re)
                                  <tr> 
                                    <td>{{$re->numRooms }}</td>
                                    <td>{{$re->firstname}} {{$re->lastname}}</td>
                                    <td>{{$re->checkin }}</td>
                                    <td>{{$re->checkout }}</td>
                                    <td>{{$re->roomType }}</td>
                                    <td>{{$re->numNights }}</td>                                              
                                    <td>{{$re->amount }}</td>
                                    <td><a href="{{url('rooms/getCheckout/'.$re->resId)}}" class="btn btn-primary btn-sm">Details</a></td>
                                  </tr>
                                @endforeach                                       
                              </tbody>
                          </table>
                      </div>                        
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive-sm">
                      <div class="card-body">
                          <table class="table table-bordered table-hover table-bg-color-chkout">
                              <thead>
                                  <tr>
                                      <th>Full Name</th>
                                      <th>Room</th>
                                      <th>RoomType</th>
                                      <th>Nights</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($getArrival as $re)
                                  <tr>                                       
                                    <td>{{$re->firstname}} {{$re->lastname}}</td>
                                    <td>{{ $re->numRooms }}</td>
                                    <td>{{ $re->roomType }}</td>                                          
                                    <td>{{ $re->numNights }}</td>
                                    <td><a href="{{url('checkinForm/'.$re->id)}}" class="btn btn-primary btn-sm">View details</a></td>
                                  </tr>
                                @endforeach                                        
                              </tbody>
                          </table>
                      </div>                        
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"> 
        <div class="content mt-3">
            <div class="animated fadeIn" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive-sm">                     
                      <div class="card-body">
                          <table class="table table-bordered table-hover table-bg-color-chkout">
                              <thead>
                                  <tr>
                                      <th>Full Name</th>
                                      <th>Room</th>
                                      <th>RoomType</th>
                                      <th>Nights</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($checkoutRes as $re)
                                  <tr>
                                    <td>{{$re->firstname}} {{$re->lastname}}</td>
                                    <td>{{ $re->numRooms }}</td>
                                    <td>{{ $re->roomType }}</td>                                          
                                    <td>{{ $re->numNights }}</td>
                                    <td><a href="{{url('rooms/getCheckout/'.$re->resId)}}" class="btn btn-primary">Check out</a></td>
                                  </tr>
                                    @endforeach                                          
                              </tbody>
                          </table>
                      </div>                        
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>
    <!-- Right Panel -->
@endsection



