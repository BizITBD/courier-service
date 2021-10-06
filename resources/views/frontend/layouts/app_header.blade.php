
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}

<!-- Header -->
<header class="main-header">
    <!-- Header Upper -->
    <div class="header-upper" id="sticky-wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="/">
                  <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" class="img-fluid" alt="logo">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @guest('login')
                    <li class="nav-item active">
                       <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/#our-services" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Service
                        </a>
                        <ul class="dropdown-menu mega-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($megaMenuItems as $data)
                            <li class="dropdown-item mega-menu-item">
                                <a class="mega-menu-item" href="/mega-menu/service/{{$data->slug}}">
                                      <img src="{{$data->icon ? '/' . $data->icon : '\assets\images\highlights-3-photoshop.png'}}"  alt="img">
                                    <div class="d-flex flex-column w-100 ml-2">
                                        {{$data->title}}
                                        <span>{{$data->subtitle}}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endauth

                    @auth('login')
                    @if(Auth::guard('login')->user()->type == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/reseller_dashboard">Dashboard</a>
                    </li>
                    @endif
                    @if(Auth::guard('login')->user()->type == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/merchant_dashboard">Dashboard</a>
                    </li>
                    @endif
                    {{-- <li class="nav-item">
                        @if(Auth::guard('login')->user()->type == 1)
                        <a class="nav-link" href="/booking">Booking</a>
                        @endif
                        @if(Auth::guard('login')->user()->type == 2)
                        <a class="nav-link" href="/merchant-booking">Booking</a>
                        @endif

                    </li> --}}
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/reseller_dashboard">Search</a>
                    </li> -->
                    @if(Auth::guard('login')->user()->type == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/reseller_payment_dashboard">Payment</a>
                    </li>
                    @endif
                    @if(Auth::guard('login')->user()->type == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/merchant_payment_dashboard">Payment</a>
                    </li>
                    @endif



                    @endguest


                    @guest('login')
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    @endauth



                    @guest('login')
                    <li class="nav-item">
                        <a class="nav-link" href="/coverage-area">coverage area</a>
                    </li>
                    @endauth
                    <ul class="user-menu-sec">
                        @guest('login')
                        <li class="menu-item">
                            <a href="/userregistration" class="user-btn menu-reg">Registration</a>
                        </li>

                        <li class="menu-item">
                            <a href="/userlogin" class="user-btn menu-login">Login</a>
                        </li>
                        @endauth
                        @auth('login')
                        <li class="menu-item">
                            {{-- <a href="/userregistration" class="user-btn menu-reg">Registration</a> --}}
                            @if(Auth::guard('login')->user()->type == 1)
                            <a class="user-btn menu-reg" href="/booking"><span class="glyphicon img-circle text-success"></span>Create Booking</a>
                            @endif

                            @if(Auth::guard('login')->user()->type == 2)
                            <a class="user-btn menu-reg" href="/merchant-booking"><span class="glyphicon img-circle text-success"></span>Create Booking</a>
                            @endif


                        </li>
                        <ul class="user-info pull-left pull-none-xsm">

                                <!-- Profile Info -->
                                <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{Auth::guard('login')->user()->image ? '/' . Auth::guard('login')->user()->image : '/assets/images/thumb-1@2x.png'}}" alt="" class="img-circle" width="44" />
                                        <strong style="color: #F5ab35">{{Auth::guard('login')->user()->name}}</strong>
                                    </a>
                                    <ul class="dropdown-menu text-center">



                                        <li>
                                            <a href="/reseller_profile" class="">View Profile</a>
                                        </li><br>
                                        <li>
                                            <a href="/successfull/bookings" class=""><i class="fas fa-sign-out">Successfuly delivered</i></a>
                                        </li><br>
                                        <li>
                                            <a href="/coverage-area" class=""><i class="fas fa-sign-out">Coverage Area</i></a>
                                        </li><br>
                                        <li>
                                            <a href="/products" class=""><i class="fas fa-sign-out">Products</i></a>
                                        </li><br>
                                        <li>
                                            <a href="/contact" class=""><i class="fas fa-sign-out">Contact</i></a>
                                        </li><br>
                                        <li>
                                            <a href="/userlogout" class=""><i class="fas fa-sign-out">Log Out</i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>


                        {{-- <li class="menu-item">
                            <a href="/userlogout" class="user-btn menu-login">Log Out</a>
                        </li> --}}
                        @endguest

                    </ul>
                </ul>
              </div>
            </nav>
        </div>
    </div>
    <!-- End Header Upper -->
</header>
<!-- End Main Header -->
