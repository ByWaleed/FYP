@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">      
                <ul>
                    @if(Auth::user()->userLevel == 1)
                     
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('getRoomForm') }}">{{ __('Add Room') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('getPaymentTypeForm') }}">Add Payment Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('list') }}">{{ __('List') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('searchRoom') }}">{{ __('Search Room') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('houseKeeping') }}">House Keeping</a>
                        </li>

                    @elseif(Auth::user()->userLevel == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('list') }}">{{ __('List') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('searchRoom') }}">{{ __('Search Room') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('houseKeeping') }}">House Keeping</a>
                        </li>
                    @elseif(Auth::user()->userLevel == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('houseKeeping') }}">House Keeping</a>
                       </li>
                    @else
                    @endif
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
