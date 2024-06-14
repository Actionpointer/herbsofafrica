<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Herbs of Africa Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    @stack('styles')
    <link href="{{asset('/assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    
    <link href="{{asset('/assets/css/general.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    
    <!-- You can change the theme colors from here -->
    <link href="{{asset('/assets/css/colors/default.css')}}" id="theme" rel="stylesheet">

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Herbs of Africa</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <h3 class="h3">Herbs of Africa</h3>
                            {{-- <img src="{{asset('/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark " href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="hidden-md-down">{{ucwords(auth()->user()->name)}} &nbsp;</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        @if(in_array('categories',auth()->user()->role))
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                                <i class="fa fa-universal-access"></i><span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        @endif
                        @if(in_array('shipments',auth()->user()->role))
                        <li class="">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-truck"></i>
                                <span class="hide-menu">Shipment</span>
                            </a>
                            <ul aria-expanded="false" class="collapse" >
                                <li><a href="{{route('admin.shipment.rates.index')}}">Rates</a></li>
                                <li><a href="{{route('admin.shipment.packages')}}">Packages</a></li>
                                
                            </ul>
                        </li>
                        @endif
                        @if(in_array('products',auth()->user()->role))
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ route('admin.products.index') }}" aria-expanded="false">
                                <i class="fa fa-medkit"></i> <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        @endif
                        @if(in_array('orders',auth()->user()->role))
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.orders.browse') }}" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Orders</span></a></li>
                        @endif
                        @if(in_array('reviews',auth()->user()->role))
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.reviews.browse') }}" aria-expanded="false"><i class="fa fa-comments"></i><span class="hide-menu">Reviews</span></a></li>
                        @endif
                        @if(in_array('customers',auth()->user()->role) || in_array('affiliates',auth()->user()->role) || in_array('staff',auth()->user()->role))
                        <li class="">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-user-circle-o"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                            <ul aria-expanded="false" class="collapse" >
                                @if(in_array('customers',auth()->user()->role))
                                <li><a href="{{ route('admin.users.customers') }}">Customers</a></li>
                                @endif
                                @if(in_array('affiliates',auth()->user()->role))
                                <li><a href="{{route('admin.users.affiliates')}}">Affiliates</a></li>
                                @endif
                                @if(in_array('staff',auth()->user()->role))
                                <li><a href="{{route('admin.users.staff')}}">Staff</a></li>
                                @endif
                                
                            </ul>
                        </li>
                        @endif
                        @if(in_array('payments',auth()->user()->role) || in_array('settlements',auth()->user()->role) || in_array('revenues',auth()->user()->role))
                        <li class="">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-credit-card"></i>
                                <span class="hide-menu">Transactions</span>
                            </a>
                            <ul aria-expanded="false" class="collapse" >
                                @if(in_array('payments',auth()->user()->role))
                                <li><a href="{{ route('admin.transactions.payments') }}">Payments</a></li>
                                @endif
                                @if(in_array('settlements',auth()->user()->role))
                                <li><a href="{{route('admin.transactions.settlements')}}">Settlements</a></li>
                                @endif
                                @if(in_array('revenues',auth()->user()->role))
                                <li><a href="{{route('admin.transactions.revenues')}}">Revenues</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        @if(in_array('settings',auth()->user()->role))
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.settings.index') }}" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings</span></a></li>
                        @endif
                        @if(in_array('posts',auth()->user()->role))
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.post.index') }}" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">Post</span></a></li>
                        @endif
                        
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.profile') }}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>
                        
                    </ul>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="text-center m-t-30">
                            <button type="submit" class="btn waves-effect waves-light btn-info hidden-md-down">Logout</button>
                        </div>
                    </form>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer">
                © 2023 Herbs of Africa
            </footer>
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('/assets/node_modules/jquery/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets/node_modules/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->

    @stack('scripts')
</body>

</html>
