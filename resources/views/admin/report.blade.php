@extends('layouts.app')
@section('content')

@if(session('updatedDatabase'))
    <div class="alert alert-danger"> {{session('updatedDatabase')}} </div>
@endif

<!--toogle tabs-->
<div class="container content mt-3">
    <!--<h4>New Reservation</h4>-->
    <div class="row">
        {{ csrf_field() }}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Report</strong></div>
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <ul class="styleBulletNone">     
                                        <li>Total Rooms: <strong>{{$reportArray['countTotalRooms']}}</strong></li>       
                                        <li>Total Check in: <strong>{{$reportArray['countGetCurdateCheckin']}}</strong></li>      
                                        <li>Total Check out: <strong>{{$reportArray['countGetCurdateCheckout']}}</strong></li>     
                                        <li>Available Rooms:<strong>{{$reportArray['countGetAvilRooms']}}</strong></li>       
                                        <li>Unavailable Rooms: <strong>{{$reportArray['countGetUnAvilRooms']}}</strong></li>       
                                        <li>Total Rooms Dirty: <strong>{{$reportArray['getCurdateDirtyRooms']}}</strong></li>       
                                        <li>Total Occupied: <strong>{{$reportArray['countOccupied']}}</strong></li>  
                                    </ul>                                    
                                </div>
                                <div class="col-md-6">  
                                    <ul class="styleBulletNone">          
                                        <li>Checkout Tomorrow: <strong>{{$reportArray['countGetTomorrowCheckout']}}</strong></li>    
                                        <li>Checkin Tomorrow: <strong>{{$reportArray['countGetTomorrowCheckin']}}</strong></li>     
                                        <li>Current Adult: <strong>{{$reportArray['countNumOfAdult']}}</strong></li>       
                                        <li>Current Child: <strong>{{$reportArray['countNumOfChild']}}</strong></li>       
                                        <li>Occupancy Percentage: <strong>{{$reportArray['occupancyPercentage']}}</strong></li>       
                                        <li>Reservation Made Today: <strong>{{$reportArray['ReservationMadeToday']}}</strong></li>       
                                        <li>AVG Sale: <strong>{{$reportArray['AVGSale']}}</strong></li>       
                                        <li>Total Sale Revenue: <strong>{{$reportArray['totalSaleRev']}}</strong></li>    
                                    </ul>           
                                </div>
                            </div> 
                        </div>             
                    </div>
                </div>
            </div>    
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Monthly Reservation Chart</strong></div>
                    <div class="card-body card-block">
                        <div class="row">                                              
                            <div class="form-group col-md-12">
                            	<canvas id="singelBarChart"></canvas>
                            </div>
                        </div>                                   
                    </div>
                </div>
            </div>     
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/myCharts.js')}}"></script>
@endsection






