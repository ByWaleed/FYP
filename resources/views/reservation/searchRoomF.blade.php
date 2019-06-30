@extends('layouts.app')
@section('content')


<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        <!--form started-->
        <form action="searchRoomResults" method="post" nctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Search for Room</strong></div>
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date">Check in Date</label>
                                <input type="date" class="form-control" id="checkInDate" name="checkInDate" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Check out date</label>
                                 <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="numNights">Nights</label>
                                <input type="number" class="form-control" id="numNights" name="numNights" min="1">
                            </div>
    
                            <div class="form-group col-md-6">
                              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Room type </label>
                              <select class="custom-select my-1 mr-sm-2" name="Rooms" id="inlineFormCustomSelectPref">
                                 @foreach ($Rooms as $room )
                                    <option value="{{ $room->roomType}}">
                                        {{$room->roomType}}
                                    </option>
                                @endforeach
                              </select>
                            </div>               
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary ">Search</button>     
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>         
        </form>
    </div>
</div>

@endsection






