<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>

    

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>PerPusWeb.com || Solution Library</title>
    <meta name="description" content="3D Grid Effect: Recreation of the effect seen in the prototype app by Marcus Eckert | Demo 2" />
    <meta name="keywords" content="3d, grid, effect, flip, css transform, perspective, web design" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="{{ asset('folder02.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontassets/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontassets/css/demo2.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontassets/css/component2.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontassets/css/bootstrap.min.css')}}" />

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
    <link href="{{ asset('css/css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="{{ asset('css/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('css/css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="{{ asset('css/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/baru/demo.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/baru/component.css') }}" /> -->

    <script src="{{asset('js/modernizr.custom2.js')}}"></script>
    <script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </head>
  <body class="demo-2">

  <header>
     <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand active" href=""><font size="+3">/P</font>usWeb<font size="-2">.com</font></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active"><a href="{{ url('User/index') }}">Daftar Buku</a></li>
          @if (Auth::guest())
            <li class="disabled"><a href="">Daftar Peminjam</a></li>
          @elseif(Auth::user()->status=="non-active" && Auth::user()->type=="user")
            <li class="disabled"><a href="">Daftar Peminjam</a></li>
          @else
            <li><a href="{{ url('User/Daftar/pinjam', array(Auth::user()->username)) }}">Daftar Peminjam</a></li>
          @endif
          <li><a href="{{ url('User/Contact/Us') }}">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li></li>
            <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @elseif(Auth::user()->status=="non-active" && Auth::user()->type=="user")
            <li></li>
            <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @else
            <li><a><img src="{{ asset(Auth::user()->gambar) }}" width="25" height="25" class="img-circle" alt="User Image"> Halo,  {{ Auth::user()->username }}</a></li>
            <li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          @endif
        </ul>
      </div>
    </nav>
    </header>

    <div class="container" style="margin-top: 5%;">
      <!-- Top Navigation -->
      <header class="codrops-header">
        <h1>
          <span id="span">
            <img src="{{asset('img/black_book_pc.ico')}}" id="div1">
            <img src="{{asset('img/book.ico')}}" id="div2">
            <font face="algerian" color="#FFF" size="+20" style="margin-top: 40%;">Perpustakaan Website</font><br />
            <font color="#FFF" size="+2" style="margin-top: 20%;">Solution Library</font>
          </span>
        </h1>
      </header>
      

  @yield('content')

  <script src="{{asset('js/classie2.js')}}"></script>
  <script src="{{asset('js/helper.js')}}"></script>
  <script src="{{asset('js/grid3d.js')}}"></script>
  <script>
    new grid3D( document.getElementById( 'grid3d' ) );
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

  <!-- jQuery UI 1.10.3 -->
  <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

  <script src="{{ asset('js/plugins/chart.js') }}" type="text/javascript"></script>

  <!-- datepicker
  <script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>-->
  <!-- Bootstrap WYSIHTML5
  <script src="{{ asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>-->
  <!-- iCheck -->
  <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <!-- calendar -->
  <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>

  <!-- Director App -->
  <script src="{{ asset('js/Director/app.js') }}" type="text/javascript"></script>

  <!-- Director dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('js/Director/dashboard.js') }}" type="text/javascript"></script>

    

  </body>
</html>