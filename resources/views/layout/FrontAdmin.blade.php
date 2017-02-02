<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PerPusWeb (Perpustakaan Berbasis Web)</title>
<link rel="shortcut icon" href="{{ asset('folder02.ico') }}">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="{{ asset('css/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="{{ asset('css/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="{{ asset('css/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/css/ionicons.css') }}" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="{{ asset('css/css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="{{ asset('css/css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<!-- <link href="{{ asset('css/css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- fullCalendar -->
<!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
<!-- Daterange picker -->
<!-- <link href="{{ asset('css/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- iCheck for checkboxes and radio inputs -->
<link href="{{ asset('css/css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="{{ asset('js/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!-- Theme style -->
<link href="{{ asset('css/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/css/iCheck/flat/green.css') }}" rel="stylesheet" type="text/css" />




</head>
<body class="skin-black">
<header class="header">
    <a href="" class="logo">
        <font size="+3">/P</font>usWeb<font size="-2">.com</font>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->gambar) }}" width="22" height="22" class="img-circle" alt="User Image">
                        <span>{{{ Auth::user()->username }}} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">Account</li>
                        <li>
                            <a href="{{ url('detail-admin', array(Auth::user()->id)) }}">
                            <i class="fa fa-user fa-fw pull-right"></i>
                                Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('auth/logout') }}"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div>
                                    <center><img src="{{ asset(Auth::user()->gambar) }}" height="150" width="150" class="img-circle" alt="User Image" style="border: 3px solid #ffffff;" /></center>
                                </div>
                                <div class="info">
                                    <center>{{{ Auth::user()->username }}}</center>

                                </div>
                            </div>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="{{ url('2016/dashboard') }}">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                
                                <li class="treeview">
                                <a href="">
                                    <i class="fa fa-user"></i>
                                    <span>Data Anggota</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ url('Data Anggota') }}"><i class="fa fa-angle-double-right"></i> List Anggota</a></li>
                                        <li><a href="{{ url('Input Anggota') }}"><i class="fa fa-angle-double-right"></i> Tambah Anggota</a></li>
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="">
                                    <i class="fa fa-book"></i>
                                    <span>Data Buku</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ url('Data Buku') }}"><i class="fa fa-angle-double-right"></i> List Buku</a></li>
                                        <li><a href="{{ url('Input Buku') }}"><i class="fa fa-angle-double-right"></i> Tambah Buku</a></li>
                                    </ul>
                                </li>

                                <li class="treeview">
                                <a href="">
                                    <i class="fa fa-globe"></i>
                                    <span>Data Transaksi</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ url('Data Transaksi') }}"><i class="fa fa-angle-double-right"></i> List Transaksi</a></li>
                                        <li><a href="{{ url('Input Transaksi') }}"><i class="fa fa-angle-double-right"></i> Transaksi</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('about') }}">
                                        <i class="fa fa-envelope"></i> <span>Tentang PerPusWeb</span>
                                    </a>
                                </li>


                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

        @yield('content')

                <div class="footer-main">
                    Copyright <a>&copy; PerPusWeb&trade;  {{{ date("Y") }}}</a>
                </div>
            </aside>
         </div>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script> -->

<!-- jQuery UI 1.10.3 -->
<!-- <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- daterangepicker -->

<!-- datepicker
<script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>-->
<!-- Bootstrap WYSIHTML5
<script src="{{ asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>-->
<!-- iCheck -->
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<!-- Director App -->
<script src="{{ asset('js/Director/app.js') }}" type="text/javascript"></script>

<!-- Director dashboard demo (This is only for demo purposes) --><!-- 
<script src="{{ asset('js/Director/dashboard.js') }}" type="text/javascript"></script> -->

<!-- <link rel="stylesheet" type="text/css" href="vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>  -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link href="{{ asset('js/vendors/bootstrap-datetimepicker/datetimepicker.css') }}" rel="stylesheet">
    <script src="{{ asset('js/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('js/vendors/form-helpers/js/bootstrap-formhelpers.min.js') }}"></script>

    <script src="{{ asset('js/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('js/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js') }}"></script>

    <script src="{{ asset('js/vendors/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/vendors/ckeditor/skins/moono/editor_gecko.css') }}">
    <script src="{{ asset('js/vendors/ckeditor/adapters/jquery.js') }}"></script>

    <script src="{{ asset('js/vendors/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('js/editors.js') }}"></script>
    <script src="{{ asset('js/js/plugins/icheck/icheck.min.js') }}"></script>

<!-- Director for demo purposes -->
<script type="text/javascript">
    $('input').on('ifChecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().addClass('highlight');
        $(this).parents('li').addClass("task-done");
        console.log('ok');
    });
    $('input').on('ifUnchecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().removeClass('highlight');
        $(this).parents('li').removeClass("task-done");
        console.log('not');
    });

</script>
<script>
    $('#noti-box').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });

    $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
        checkboxClass: 'icheckbox_flat-grey',
        radioClass: 'iradio_flat-grey'
    });
</script><!-- 
<script type="text/javascript">
    $(function() {
        "use strict";
        //BAR CHART
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
    new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
        responsive : true,
        maintainAspectRatio: false,
    });

    });
            // Chart.defaults.global.responsive = true;
</script>
<script>
</script> -->
</body>
</html>