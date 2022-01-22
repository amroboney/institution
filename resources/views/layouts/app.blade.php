<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Them -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!-- <meta name="viewport" content="width=device-width" /> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- sweet alert 2 -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    

    <!-- Style them--> 
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/family.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    <!-- style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />


</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure" data-image="/img/sidebar-4.jpg">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text" href="{{ url('/home') }}">
                {{-- <a class="simple-text" href="{{ url('/') }}"> --}}
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img class="img-logo" src="/img/logo.png">
                    
                </a>
            </div>


            <ul class="nav" id="nav">
                @foreach($types as $key => $type)
                    <li  class="">
                        <a href="/type/{{$type->id}}">
                            <i class="pe-7s-graph"></i>
                            <p class="font-style ">{{$type->name}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
            {{-- <ul class="nav" id="nav"> --}}
                <form method="post" action="/add_type" class="input-footer">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-9 pull-right " style="padding-right: 41px;">
                            <input type="text" name="name" class="form-control" placeholder="الدورة التدريبية"  required="" style="background-color: #4caae4; text-align: right;" >
                        </div>
                        <div class="col-md-3" style="padding-left: 21px;">
                            <button type="submit" class="btn btn-info btn-fill  form-control">+</button>
                        </div>
                    </div>
                </form>
            {{-- </ul> --}}
        </div>

        </div>

        <div class="main-panel">


            <nav class="navbar navbar-default navbar-fixed">


            <div class="container-fluid">


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Dashboard</a> -->
                    
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                @yield('page_name')
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-left">
                        
                        
                        <li>
                            <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <footer>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-align: right;">
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </footer>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                        </li>

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>

                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                 @yield('content')
            </div>
        </div>

        <footer class="footer hidden-print" dir="rtl">
            <div class="container-fluid">
                <!-- <nav class="pull-right">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav> -->
                <p class="copyright pull-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> Created By,  <a href="Amro Adil">Amro Boney</a>
                </p>
            </div>
        </footer>

        </div>

    </div>








    <!-- Scripts --> 
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" type="text/javascript"></script>


    <!-- Script them -->
    <!--   Core JS Files   -->
    <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio-switch.js') }}"></script>

    <!--  notify -->
    <!-- <script src="/js/bootstrap-notify.min.js"></script> -->

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }} "></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 -->
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src=" {{ asset('js/light-bootstrap-dashboard.js') }} "></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}"></script>

        <!-- <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("nav");
        var btns = header.getElementsByClassName("sid");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
        </script> -->
 
</body>
</html>
