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
      <p>Total stay:  </p>
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
      </tr>
      @endforeach

    </tbody>
  </table>
  </div>
@endsection
