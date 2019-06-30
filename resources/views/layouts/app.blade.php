<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EG House</title>
    <meta name="description" content="EG House - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
 <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

       <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="{{ asset('assets/css/custom_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


   
   



</head>

<body>
 

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">EG House<alt="Logo"></a>
                
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">              
                 @guest
                 <!-- <a class="navbar-brand"href="{{ url('/') }}" alt="Logo">EG House</a>  -->
                   <li>
                        <a href="{{ route('login') }}"   aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Login</a>
                    </li>
                   
                   @else 
                    @if(Auth::user()->userLevel == 1) 
                    <li>
                        <a href="{{ url('list') }}"  data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{ url('searchRoom') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-calendar-check"></i>New Reservation</a>
                    </li>
                      <li>
                        <a href="{{ url('houseKeeping') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-broom"></i>House Keeping</a>
                    </li>
                    <li>
                        <a href="{{ url('getReport') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Reports</a>
                    </li>
                     <li>
                         <form action="/search" method="get" class="form-inline my-2 my-lg-0 ml-auto">
                             <input class="form-control" type="search" placeholder="Search" id="search" name="search" aria-label="Search">
                            <button  class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="display: none;">Search</button>
                          </form> 
                    </li>    
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Admin</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bed"></i><a href="{{ url('getRoomForm') }}">Add Rooms</a></li>
                            <li><i class="menu-icon fas fa-user-plus"></i><a href="{{ url('systemAdmin') }}">New users</a></li>
                            <li><i class="menu-icon fa fa-pencil-square-o"></i><a href="{{ url('getPaymentTypeForm') }}">Payments</a></li>
                        </ul>
                    </li>




                     @elseif(Auth::user()->userLevel == 2)
                       <li>
                        <a href="{{ url('list') }}"  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{ url('searchRoom') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-calendar-check"></i>New Reservation</a>
                    </li>
                      <li>
                        <a href="{{ url('houseKeeping') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-broom"></i>House Keeping</a>
                    </li>
                    <li>
                        <a href="{{ url('getReport') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Reports</a>
                    </li>
                     <li>
                         <form action="/search" method="get" class="form-inline my-2 my-lg-0 ml-auto">
                             <input class="form-control" type="search" placeholder="Search" id="search" name="search" aria-label="Search"> 
                             <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" style="display: none;">Search</button>
                          </form> 
                    </li>
                   @elseif(Auth::user()->userLevel == 3)
                    <li>
                      <a href="{{ url('houseKeeping') }}" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-broom"></i>House Keeping</a>
                    </li>
                     @else
                    @endif
                    <li>                    
          
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <i class="menu-icon fas fa-sign-out-alt"></i>{{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                                
                    </li>
                     @endguest                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>



    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    

    @yield ("scripts")


</html>
