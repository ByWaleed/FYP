@extends('layouts.app')
@section('content')

<div class="container content mt-3">
  <div class="row">
  <!--form started-->  
    <form action="storePaymentType" method="post" nctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><strong>Insert New Code</strong></div>
            <div class="card-body card-block">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="paymentCode">Payment Code </label>
                  <input type="number" class="form-control" id="paymentCode" name="paymentCode" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="description">Description </label>
                  <input type="text" class="form-control" id="description" name="description" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary float-right ">Add Code</button>   
                  </div>        
                </div>
              </div>                     
            </div>
          </div>
        </div>       
    </form>
  </div>
</div>




<br>
<br>
  @if(session('updatedDatabase'))
  <div class="alert alert-success"> {{session('updatedDatabase')}} </div>
  @endif
<div class="col-lg-12">
 <div class="card">
    <div class="card-header"><strong>Payment Types</strong></div>
    <div class="card-body card-block">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-bg-color-chkout">
      <thead>
        <tr>
          <th>Payment Code</th>
          <th>Description</th>
          <th colspan="2" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
           @foreach($paymentTypes as $paymentType)
       <tr>
         <td>{{ $paymentType->paymentCode }}</td>
         <td>{{$paymentType->description }}</td>
         <td><a href="{{url('payments/editPaymentTypeForm/'.$paymentType->id)}}" class="btn btn-primary">Edit</a></td>
         <td><a href="{{url('payments/removePaymentType/'.$paymentType->id)}}" class="btn btn-danger">Remove</a></td>
       </tr>
         @endforeach
     </tbody>
    </table>
  </div>
   </div>
        </div>
      </div>
      
  @endsection

