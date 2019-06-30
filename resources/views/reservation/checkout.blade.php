@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif

  <div class="col-lg-12 ">
  <div class="card">
    <div class="card-header"><strong>Reservation Details</strong></div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <p>Room: {{$getCuctomerDetails->numRooms}}</p>
            <p>Name: {{$getCuctomerDetails->title}} {{$getCuctomerDetails->firstname}} {{$getCuctomerDetails->lastname}}</p>
            <p>Address: {{$getCuctomerDetails->doorNum}} {{$getCuctomerDetails->streetName}} {{$getCuctomerDetails->city}}
          {{$getCuctomerDetails->postcode}} {{$getCuctomerDetails->country}}
            </p>
          </div>
          <div class="col-sm-3">
            <p>Checkin: {{$getCuctomerDetails->checkin}} </p>
            <p>Checkout: {{$getCuctomerDetails->checkout}}</p>
            <p>Nights: {{$getCuctomerDetails->numNights}}</p>
            <p>Adult: {{$getCuctomerDetails->adult}}  Child: {{$getCuctomerDetails->child}}</p>
          </div>
          <div class="col-sm-3">
            <p>Price per night: {{$getCuctomerDetails->amount}}</p>
            <p>Market Code:</p>
            <p>Total stay: {{$totalStay}} </p>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <p>Notes: {{$getCuctomerDetails->notes}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-lg-12">
 <div class="card">
    
    <div class="card-body card-block"> 
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-bg-color-chkout">
    <thead>
      <tr>
        <th>Room</th>
        <th>Payment methods</th>
        <th>Date</th>
        <th>Debit</th>
        <th>Credit</th>
        <th colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($findpayments as $payment)
      <tr>
        <td>{{$payment->roomNum}}</td>
        <td>{{$payment->type}} - {{$payment->description}}</td>
        <td>{{$payment->date}}</td>
        <td>{{$payment->Debit}}</td>
        <td>{{$payment->Credit}}</td>
         <td><a href="{{url('payments/editPaymentForm/'.$payment->payment_id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{url('payments/removePayment/'.$payment->payment_id)}}" class="btn btn-danger">Remove</a></td>
      </tr>
      @endforeach
      <tr>      
        <td colspan="2">
          <label for="debit">Total </label>
          <input type="text" class="form-control pull-right" id="amount" name="amount"  value="{{$sumTotal}}" readonly>
        </td>
        <td colspan="5"></td>       
      </tr> 
      <tr>
      <td colspan="1"><a href="" class="btn btn-primary btn-block">Email</a></td>
      <td colspan="1"><a href="{{url('generatepdf/'.$getCuctomerDetails->resId)}}" class="btn btn-primary btn-block">Print</a></td>
      @if($sumTotal === 0 || $sumTotal === 0.0 )
      <td colspan="1"><a href="{{url('reservation/checkoutReservation/'.$getCuctomerDetails->resId)}}" class="btn btn-danger btn-block">checkout</a></td>
      @else
      @endif
      <td colspan="2"><a href="{{url('updateResForm/'.$getCuctomerDetails->customer_id)}}" class="btn btn-danger btn-block">Edit Reservation</a></td>
      <td colspan="2"><a href="{{url('list')}}" class="btn btn-danger btn-block">Cancel</a></td>
    </tr>
    </tbody>
  </table>
  </div>
    </div>
   </div>
 </div>
      


<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        <!--form started-->
       <form action="/payments/makePayment/{{$resId}}" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}

          <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header"><strong>Add New payment</strong></div>
                    <div class="card-body card-block">
                        <div class="row">
                          <div class="form-group col-md-4">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type </label>
                           <select class="custom-select my-1 mr-sm-2" name="type" id="type">
                             @foreach($paymentTypes as $paymentType)
                             <option value="{{ $paymentType->paymentCode}}" >
                                   {{ $paymentType->paymentCode}} - {{ $paymentType->description}}
                              </option>
                              @endforeach
                           </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="Comments">Comments </label>
                            <input type="text" class="form-control" id="comment" name="comment">
                          </div>
                           <div class="form-group col-md-4">
                            <label for="debit">amount </label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="20.10">
                          </div>
                        </div>                        
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">Insert</button>   
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

