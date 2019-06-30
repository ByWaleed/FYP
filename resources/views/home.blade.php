@extends('layouts.app')

@section('content')
@if(Auth::user()->userLevel == 1)
<div class="card">
    <div class="card-header"><strong></strong></div>
        <div class="card-body card-block">
        <div class="container">
            <div class="row">
                <div class="typo-headers">                    
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                         <h1 class="text-center">Welcome</h1>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                         <h3 class="text-center">To</h3>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4">
                         <h2 class="text-center" >Edgerton Guest House!</h2>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                </div> 
        <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-user-cog fa-5x"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                         <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-concierge-bell fa-5x"></i>
                                </a>
                    </div>
                    <div class="col-lg-4">
                        <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-broom fa-5x"></i>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
  @elseif(Auth::user()->userLevel == 2)
<div class="card">
    <div class="card-header"><strong></strong></div>
        <div class="card-body card-block">
        <div class="container">
            <div class="row">
                <div class="typo-headers">
                    </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                         <h1 class="text-center">Welcome</h1>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                         <h3 class="text-center">To</h3>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4">
                         <h2 class="text-center" >Edgerton Guest House!</h2>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                </div> 
        <div class="row">
                <div class="col-lg-12">                    
                    <div class="col-lg-4">
                         <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-concierge-bell fa-5x"></i></a>
                    </div>
                    <div class="col-lg-4">
                        <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-broom fa-5x"></i></a>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@elseif(Auth::user()->userLevel == 3)
<div class="card">
    <div class="card-header"><strong>Edgerton Guest House</strong></div>
        <div class="card-body card-block">
            <div class="container">
                <div class="row">
                    <div class="typo-headers">
                        </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                         <h1 class="text-center">Welcome</h1>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                         <h3 class="text-center">To</h3>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4">
                         <h2 class="text-center" >Edgerton Guest House!</h2>
                    </div>
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                </div> 
        <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-broom fa-5x"></i></a>
                        </div>
                         <div class="col-lg-4"></div>
                         <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
 @else
@endif
@endsection
