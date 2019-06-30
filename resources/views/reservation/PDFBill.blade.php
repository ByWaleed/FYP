@extends('layouts.app')
@section('content')

  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif
  <div class="card">
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
          <p>Room: {{$getCuctomerDetails->numRooms}}</p>
          <p>Name: {{$getCuctomerDetails->title}} {{$getCuctomerDetails->firstname}} {{$getCuctomerDetails->lastname}}</p>
          <p>Address: {{$getCuctomerDetails->doorNum}} {{$getCuctomerDetails->streetName}} {{$getCuctomerDetails->city}}
        {{$getCuctomerDetails->postcode}} {{$getCuctomerDetails->country}}
          </p>
        </div>
        <div class="col-sm-4">
          <p>Checkin: {{$getCuctomerDetails->checkin}} </p>
          <p>Checkout: {{$getCuctomerDetails->checkout}}</p>
          <p>Nights: {{$getCuctomerDetails->numNights}}</p>
          <p>Adult: {{$getCuctomerDetails->adult}}  Child: {{$getCuctomerDetails->child}}</p>
      </div>
      <div class="col-sm-4">
      <p>Price per night: {{$getCuctomerDetails->amount}}</p>
      <p>Market Code:</p>
      <p>Total stay: {{$totalStay}} </p>
    </div>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>reservation_id</th>
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
        <td>{{$payment->payment_id}}</td>
        <td>{{$payment->reservation_id}}</td>
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
        <td>
          <label for="debit">Total </label>
          <input type="text" class="form-control" id="amount" name="amount"  value="{{$sumTotal}}">

        </td>
      </tr>
    </tbody>
  </table>
  </div>
<br>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <td><a href="" class="btn btn-primary">Insert</a></td>
      <td><a href="{{url('updateResForm/'.$getCuctomerDetails->customer_id)}}" class="btn btn-danger">Edit Reservation</a></td>
      <td><a href="" class="btn btn-primary">Email</a></td>
      <td><a href="{{url('generatepdf/'.$getCuctomerDetails->resId)}}" class="btn btn-primary">Print</a></td>
      @if($sumTotal === 0 || $sumTotal === 0.0 )
      <td><a href="{{url('reservation/checkoutReservation/'.$getCuctomerDetails->resId)}}" class="btn btn-danger">checkout</a></td>
      @else
      @endif
      <td><a href="{{url('list')}}" class="btn btn-danger">Cancel</a></td>
    </tr>


  </tbody>
</table>
</div>
<br>
<br>
<form action="/payments/makePayment/{{$resId}}" method="post" nctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type </label>
     <select class="custom-select my-1 mr-sm-2" name="type" id="type">
       @foreach($paymentTypes as $paymentType)
       <option value="{{ $paymentType->paymentCode}}" >
             {{ $paymentType->paymentCode}} - {{ $paymentType->description}}
        </option>
        @endforeach
     </select>
    </div>
    <div class="form-group col-md-6">
      <label for="Comments">Comments </label>
      <input type="text" class="form-control" id="comment" name="comment">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="debit">amount </label>
      <input type="text" class="form-control" id="amount" name="amount" placeholder="20.10">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add Payment</button>
</form>
@endsection
