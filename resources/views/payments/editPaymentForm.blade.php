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
  <form action="/payments/editPayment/{{$getPayment->id}}" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><strong>Room Details</strong></div>
            <div class="card-body card-block">

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="roomType">Type </label>
                  <input type="number" class="form-control" id="type" name="type" value="{{$getPayment->type}}" required readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="Description">Amount </label>
                  <input type="text" class="form-control" id="Amount" name="Amount" value="{{$getPayment->amount}}" required>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Add Payment</button>   
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
  @endsection





