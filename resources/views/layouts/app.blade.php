<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles
        <link href="{{url('/')}}/css/app.css" rel="stylesheet" type="text/css"/>
        --> 

        <!-- App Style -->
        <link href="{{url('/')}}/css/app.css" rel="stylesheet" type="text/css"/>        

        <!-- Bootstrap Core CSS -->
        <link href="{{url('/')}}/theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{url('/')}}/theme/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{url('/')}}/theme/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{url('/')}}/theme/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{url('/')}}/theme/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{url('/')}}/theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


        <link href="{{url('/')}}/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url('/')}}/jquery-ui/theme.css" rel="stylesheet" type="text/css"/>
        <link href="{{url('/')}}/sa/sweetalert.css" rel="stylesheet" type="text/css"/>
        

        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-cube fa-fw"></i>
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->

                    <li class="dropdown pull-right">

                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endif
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            @if (!Auth::guest())
                            <li>
                                <a href="{{url('/home')}}"><i class="fa fa-user fa-2x fa-fw"></i>Welcome {{ Auth::user()->name }} !</a>
                            </li>
                            @endif
                            <li>
                                <a href="{{url('/theme/pages/index.html')}}"><i class="fa fa-dashboard fa-2x fa-fw"></i> Example Pages</a>
                            </li>    
                            <li>
                                <a href="#"><i class="fa fa-gear fa-2x fa-fw"></i>Config<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{url('type')}}">Types</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li class="social-links pull-right">
                                <div>   
                                    <a href="#"><i class="fa fa-facebook-square fa-2x fa-fw text-primary"></i></a>
                                    <a  href="#"><i class="fa fa-twitter-square fa-2x  fa-fw text-info"></i></a>
                                    <a  href="#"><i class="fa fa-google-plus-square fa-2x  fa-fw text-danger"></i></a>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            @yield('content')

            <!-- /#page-wrapper -->
        </div>











        <!-- Scripts 

        <script src="{{url('/')}}/js/app.js" type="text/javascript"></script>-->

        <!-- jQuery -->
        <script src="{{url('/')}}/theme/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('/')}}/theme/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{url('/')}}/theme/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript
        <script src="{{url('/')}}/theme/vendor/raphael/raphael.min.js"></script>
        <script src="{{url('/')}}/theme/vendor/morrisjs/morris.min.js"></script>
        <script src="{{url('/')}}/theme/data/morris-data.js"></script>
        -->
        <!-- Custom Theme JavaScript -->
        <script src="{{url('/')}}/theme/dist/js/sb-admin-2.js"></script>

        <!-- DataTables JavaScript -->
        <script src="{{url('/')}}/theme/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/theme/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="{{url('/')}}/theme/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script src="{{url('/')}}/js/lottojs.js" type="text/javascript"></script>
        <script src="{{url('/')}}/js/jquery-ui.min.js" type="text/javascript"></script>      
        <script src="{{url('/')}}/sa/sweetalert.min.js" type="text/javascript"></script>
    </body>
</html>
