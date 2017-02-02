@extends('layout.FrontLayout')

@section('content')
<?php
  date_default_timezone_set("Asia/Jakarta");
?>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<b>Selamat Datang di PerPusWeb (Perpustakaan Berbasis Website), Untuk Login Admin silahkan klik Icon User atau klik <a href="{{ url('auth/login') }}">disini</a></b>
        	</div>
        </div>

        <div class="col-md-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    <b>Data Peminjam Hari Ini</b>
                </header>
                <div class="panel-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama peminjam</th>
                                <th>Tanggal peminjaman</th>
                                <th>batas peminjaman </th>
                                <th>tanggal kembali</th>
                                <th>status </th>
                	        </tr>
                        </thead>
                              
                        @foreach($peminjam as $p)
	                    <tbody>
		                    <tr>
			                    <td>{{{ $p['nama_peminjam'] }}}</td>
			                    <td>{{{ $p['tgl_pinjam'] }}}</td>
                          <td>{{{ $p['batas'] }}}</td>
                          @if($p['status']=="sudah kembali")
                          <td>{{{ $p['tgl_kembali'] }}}</td>
                          @else($p['status']=="belum kembali")
                            <td><span class="text text-danger"><b>anda belum mengembalikan</b></span></td>
                            @endif

			                    @if($p['status']=="sudah kembali")
                            <td><span class="label label-success"><i class="fa fa-check"></i>{{ $p['status'] }}</span></td>
                          @else($p['status']=="belum kembali")
                            <td><span class="label label-danger"><i class="fa fa-times"></i> {{ $p['status'] }}</span></td>
                            @endif
			                </tr>
			            </tbody>
		                @endforeach
              
                    </table> <hr />
                    
                  	<center>
                  		<h4>Jumlah Pengunjung Hari Ini : {{{ $result }}} Orang </h4>
                  	</center>
                </div>
            </section>
		</div>                    
<div class="col-md-12">
    <section class="panel panel-primary">
        <header class="panel-heading">
            <b>  Data semua peminjam</b>
        </header>
        <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                    <th>Nama peminjam</th>
                    <th>Tanggal peminjaman</th>
                    <th>batas peminjaman </th>
                    <th>tanggal kembali</th>
                    <th>status </th>
                  </tr>
              </thead>
              @foreach($pinjam as $k)
              <tbody>
                  <tr>
                      <td>{{{ $k['nama_peminjam'] }}}</td>
                          <td>{{{ $k['tgl_pinjam'] }}}</td>
                          <td>{{{ $k['batas'] }}}</td>
                          @if($k['status']=="sudah kembali")
                          <td>{{{ $k['tgl_kembali'] }}}</td>
                          @else($k['status']=="belum kembali")
                            <td><span class="text text-danger"><b>belum kembali</b></span></td>
                            @endif

                          @if($k['status']=="sudah kembali")
                            <td><span class="label label-success"><i class="fa fa-check"></i>{{ $k['status'] }}</span></td>
                          @else($k['status']=="belum kembali")
                            <td><span class="label label-danger"><i class="fa fa-times"></i> {{ $k['status'] }}</span></td>
                            @endif
                  </tr>
              </tbody>
              @endforeach
          </table> <hr />
          <div class="pagination">@include('pagination.default', ['paginator' => $pinjam])</div>
          
           <center>
               <h4>Jumlah Pengunjung : {{{ $jum_pinjam }}} Orang </h4>
            </center>
      </div>
  </section>                   
</div>
</div>
</section>
@endsection