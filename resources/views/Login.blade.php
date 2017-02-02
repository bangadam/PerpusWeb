<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="PerPusWeb (Perpustakaan Berbasis Web)">
    <meta name="author" content="Hakko Bio Richard">
    <link rel="icon" href="{{ asset('folder02.ico') }}">

    <title>PerPusWeb (Perpustakaan Berbasis Web)</title>

    <link href="{{ asset('css/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

  </head>

  <body background="{{ asset('img/page-background.png') }}">
    <!-- <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ url('User/index') }}">
            <button class="btn btn-info btn-xs"> Skip <i class="glyphicon glyphicon-fast-forward"></i></button>
          </a>
        </li>
      </ul>
    </div> -->

    <div class="container">


      <form class="form-signin" action="{{ url('auth/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <center><h2 class="form-signin-heading"><font size="+5"><span class="fa fa-windows"></span> /P</font>usWeb<font size="-2">.com</font></h2></center>
        <!-- <center><h3>Admin</h3></center> -->
        @if ($error=="yes")
          <div class="alert alert-danger">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ma'af!</strong> Anda salah memasukkan username atau password.<br><br>
          </div>
        @elseif ($error=="status")
          <div class="alert alert-danger">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ma'af!</strong> Username sudah tidak lagi aktif.<br><br>
          </div>
        @elseif ($error=="daftar")
          <div class="alert alert-danger">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ma'af!</strong> Anda Belum terdaftar dalam anggota kami, silahkan minta Petugas PerPusWeb mendaftarkan Anda.<br><br>
          </div>
        @endif

        <div class="input-group"  style="margin-bottom: 5px;">
         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
         <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus="on" required>
        </div>
        <div class="input-group" style="margin-bottom: 5px;">
         <span class="input-group-addon"><i class="fa fa-key"></i></span>
         <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
        </div>
        <!-- <div class="input-group" style="margin-top: 5px;">
         <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
         <select class="form-control" name="type" required>
           <option>- Types -</option>
           <option value="user">USER</option>
           <option value="admin">ADMIN</option>
         </select>
         </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      
    </div>
    
    <footer><center><h5 class="form-signin">Copyright &copy; {{{ date("Y")}}} <a href="{{ url('/') }}">PerPusWeb.com</a></h5></center></footer>
    
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">PerPusWeb Info</h4>
      </div>
      <div class="modal-body">
      PerPusWeb adalah aplikasi perpustakaan bebasis website yang responsif, PerPusWeb ini digunakan untuk memudahkan para pembaca buku bisa memilih buku bacaan sesuai dengan keinginan dan mudah untuk transaksi peminjaman
       Hubungi kami :
      <table>
      <tr>
      <td>No Telepon</td> <td>:</td> <td>0856 949 848 03</td>
      </tr>
      <br />
      <td>Facebook</td>       <td>:</td> <td><a href="www.facebook.com/iwanteguh83" target="_blank">www.facebook.com/</a></td>
      </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".btn").click(function(){
          $(this).button("loading", "load").delay(2000).queue(function(){
            $(this).button('reset');
            $(this).dequeue();
          });
        });
      });
    </script>
  </body>
</html>
