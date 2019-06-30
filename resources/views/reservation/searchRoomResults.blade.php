@extends('layouts.app')
@section('content')


<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        <!--form started-->
        <form action="searchRoomResults1" method="post" nctype="multipart/form-data">

    {{ csrf_field() }}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><strong>Reservation Details</strong></div>
                <div class="card-body card-block">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date">CheckIn</label>
                            <input type="date" class="form-control" id="checkInDate" name="checkInDate" value="{{$arrayData['checkInDate']}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Checkout</label>
                            <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value="{{$arrayData['checkOutDate']}}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="numNights">Nights:</label>
                            <input type="number" class="form-control" id="numNights" name="numNights" value="{{$arrayData['numNights']}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="adults">Adult:</label>
                            <input type="number" class="form-control" id="adults" name="adults" min="1">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="child">Child:</label>
                            <input type="number" class="form-control" id="child" name="child" min="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Avilable Rooms </label>

                            <select class="custom-select my-1 mr-sm-2" name="roomNum" id="inlineFormCustomSelectPref">
                                @foreach ($getDates as $room )
                                <option value="{{ $room->roomNum}}">
                                    {{$room->roomNum}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                         <div class="form-group col-md-5">
                          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Avilable Rooms </label>

                          <select class="custom-select my-1 mr-sm-2" name="getRooms" id="inlineFormCustomSelectPref">
                             @foreach ($getDates as $room )
                             <option value="{{ $room->roomType}}">
                                   {{$room->roomType}}
                                </option>
                              @endforeach
                          </select>

                        </div>

                        <div class="form-group col-md-5">
                            <label for="text">Amounts</label>
                            <input type="number" min="0.01" class="form-control" placeholder="£ 0.00" id="amounts" name="amounts" min="1">
                        </div>

                        <div class="form-group col-md-10">
                            <label for="cardType">Card type</label>
                            <select id="inputCardType" name="inputCardType" class="form-control">
                                <option value="credit">Credit</option>
                                <option value="visa">Visa</option>
                                <option value="american express">American express</option>
                            </select>
                        </div>

                        <div class="form-group col-md-7">
                            <label for="inputZip">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="date">Expiry date</label>
                            <input type="date" class="form-control" id="expiryDate" name="expiryDate">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="CVCNum">CVC</label>
                            <input type="number" class="form-control" id="CVCNum"name="CVCNum">
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
                            <input type="text" class="form-control" id="title" name="title" placeholder="">
                        </div>
                    </div>
                      
                    <div class="row">            
                        <div class=" col-md-4">
                            <label for="inputfirstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" required>
                        </div>                     
                        <div class="form-group col-md-4">
                            <label for="inputlastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required>
                        </div>
                    </div> 
                    <div class="row">                                        
                        <div class="form-group col-md-5">
                            <label for="inputDoorNum">Door number</label>
                            <input type="text" class="form-control" id="inputDoorNum" name="inputDoorNum" placeholder="12">
                        </div>
                    </div>
                    
                    <div class="row">                            
                        <div class="form-group col-md-6">
                            <label for="inputStreet">Street</label>
                            <input type="text" class="form-control"id="inputStreet" name="inputStreet" placeholder="Smith Lane">
                        </div>            
                        <div class="form-group col-md-4">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="London">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputZip">Postcode:</label>
                            <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="LS11DED">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputCity">Country:</label>
                            <input type="text" class="form-control" id="inputCountry" name="inputCountry" placeholder="UK">
                        </div>
                     </div>
            
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="inputPhoneNumber">Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="">
                        </div>                                   
                        <div class="form-group col-md-5">
                            <label for="inputEmail">Email Address:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                        </div>                                    
                    </div>            
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="reference">Reference</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">   
                        <label for="notes">Example textarea</label>                      
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary ">Submit</button>   
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






