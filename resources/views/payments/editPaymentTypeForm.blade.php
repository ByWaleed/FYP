@extends('layouts.app')
@section('content')

<div class="container content mt-3">
  <div class="row">
  <!--form started-->  
    <form action="/payments/editPaymentTypeNow/{{$paymentType->id}}" method="post" nctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><strong>Room Details</strong></div>
            <div class="card-body card-block">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="paymentCode">Payment Code </label>
                  <input type="number" class="form-control" id="paymentCode" name="paymentCode" value="{{$paymentType->paymentCode}}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="description">Description </label>
                  <input type="text" class="form-control" id="description" name="description" value="{{$paymentType->description}}" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Update Code</button>   
                  </div>        
                </div>
              </div>                     
            </div>
          </div>
        </div>       
    </form>
  </div>
</div>


  @endsection




