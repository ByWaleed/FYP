<!DOCTYPE HTML>
<html>
<head>
<title>Invoice for {{$getCustomerDetails->title}} {{$getCustomerDetails->firstname}} {{$getCustomerDetails->lastname}}</title>
</head>



<body>
  <h1>Edgerton Guest House</h1>
  <div class="card">
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
          <p>Room: {{$getCustomerDetails->numRooms}}</p>
          <p>Name: {{$getCustomerDetails->title}} {{$getCustomerDetails->firstname}} {{$getCustomerDetails->lastname}}</p>
          <p>Address: {{$getCustomerDetails->doorNum}} {{$getCustomerDetails->streetName}} {{$getCustomerDetails->city}}
        {{$getCustomerDetails->postcode}} {{$getCustomerDetails->country}}
          </p>
        </div>
        <div class="col-sm-4">
          <p>Checkin: {{$getCustomerDetails->checkin}} </p>
          <p>Checkout: {{$getCustomerDetails->checkout}}</p>
          <p>Nights: {{$getCustomerDetails->numNights}}</p>
          <p>Adult: {{$getCustomerDetails->adult}}  Child: {{$getCustomerDetails->child}}</p>
      </div>
      <div class="col-sm-4">
      <p>Price per night: {{$getCustomerDetails->amount}}</p>
      <p>Market Code:</p>
      </div>
      </div>
    </div>
  </div>
</div>


<div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th>Room</th>
      <th>Payment methods</th>
      <th>Date</th>
      <th>Debit</th>
      <th>Credit</th>
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
</body>

</html>
