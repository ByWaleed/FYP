@extends('layouts.app')
@section('content')

@if(session('updatedDatabase'))
    <div class="alert alert-danger"> {{session('updatedDatabase')}} </div>
@endif

<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        <!--form started-->
        <form action="/updateReservation/{{$reservations->customer_id}}" method="post" nctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Reservation Details</strong></div>
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date">CheckIn</label>
                                <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="{{ $reservations->checkin }}"  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Checkout</label>
                                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="{{ $reservations->checkout}}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="numNights">Nights:</label>
                                <input type="number" class="form-control" id="numNights" name="numNights" value="{{ $reservations->numNights}}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="adults">Adult:</label>
                                <input type="number" class="form-control" id="adults" name="adults" value="{{ $reservations->adult}}" min="1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="child">Child:</label>
                                <input type="number" class="form-control" id="child" name="child" value="{{ $reservations->child}}" min="0">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Avilable Rooms </label>

                                <select class="custom-select my-1 mr-sm-2" name="roomNum" id="inlineFormCustomSelectPref">
                                    <option value="{{ $reservations->numRooms}}">
                                       {{ $reservations->numRooms}}
                                    </option>
                                </select>
                            </div>

                             <div class="form-group col-md-5">
                              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Avilable Rooms </label>

                                <select class="custom-select my-1 mr-sm-2" name="getRooms" id="inlineFormCustomSelectPref">
                                    <option value="{{ $reservations->roomType}}" >
                                        {{ $reservations->roomType}}
                                    </option>                                
                                </select>

                            </div>

                            <div class="form-group col-md-5">
                                <label for="text">Amounts</label>
                                <input type="text" class="form-control" id="amounts" name="amounts" value="{{ $reservations->amount}}" min="1">
                            </div>

                            <div class="form-group col-md-10">
                                <label for="cardType">Card type</label>
                                <select id="inputCardType" name="inputCardType" class="form-control">
                                     <option value="{{ $reservations->cardType}}">{{ $reservations->cardType}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-7">
                                <label for="inputZip">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="{{ $reservations->CCNum}}" >
                            </div>
                            <div class="form-group col-md-5">
                                <label for="date">Expiry date</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiryDate" min="2019-04-20" name="expiryDate" value="{{ $reservations->expDate}}" >
                            </div>

                            <div class="form-group col-md-3">
                                <label for="CVCNum">CVC</label>
                                <input type="number" class="form-control" id="CVCNum"name="CVCNum" value="{{ $reservations->cvc}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- finish reservation form-->
                        
            <!--Start of customer  details-->
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-header"><strong>Customer Details</strong></div>
                    <div class="card-body card-block">
                       <div class="row">                                              
                            <div class="form-group col-md-2">
                                <label for="inputTitle">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $reservations->title}}" placeholder="">
                            </div>
                        </div>
                          
                        <div class="row">            
                            <div class=" col-md-4">
                                <label for="inputfirstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $reservations->firstname}}"placeholder="" required>
                            </div>                     
                            <div class="form-group col-md-4">
                                <label for="inputlastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="{{ $reservations->lastname}}" required>
                            </div>
                        </div> 
                        <div class="row">                                        
                            <div class="form-group col-md-5">
                                <label for="inputDoorNum">Door number</label>
                                <input type="text" class="form-control" id="inputDoorNum" name="inputDoorNum" value="{{ $reservations->doorNum}}" placeholder="12">
                            </div>
                        </div>
                        
                        <div class="row">                            
                            <div class="form-group col-md-6">
                                <label for="inputStreet">Street</label>
                                <input type="text" class="form-control" id="inputStreet" name="inputStreet" value="{{ $reservations->streetName}}" placeholder="Smith Lane">
                            </div>            
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity" value="{{ $reservations->city}}" placeholder="London">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputZip">Postcode:</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip" value="{{ $reservations->postcode}}" placeholder="LS11DED">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">Country:</label>
                                <input type="text" class="form-control" id="inputCountry" name="inputCountry" value="{{ $reservations->country}}" placeholder="UK">
                            </div>
                         </div>
                
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="inputPhoneNumber">Phone Number:</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"value="{{ $reservations->phone}}"  placeholder="">
                            </div>                                   
                            <div class="form-group col-md-5">
                                <label for="inputEmail">Email Address:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $reservations->email}}" required>
                            </div>                                    
                        </div>            
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="reference">Reference</label>
                                <input type="text" class="form-control" id="reference" name="reference" value="{{$reservations->reference}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">                         
                                <label for="reference">Notes</label>
                                <input type="text" class="form-control" id="notes" name="notes" value="{{$reservations->notes}}">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <div class="col-md-6">
                                <a href="{{url('list')}}" class="btn btn-danger">Cancel</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary ">submit</button>   
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






