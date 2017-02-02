@extends('layout.UserLayout')

@section('content')					
	<div class="panel-body table-responsive">
      	
        <table id="example" class="table table-hover table-responsive">
          	<thead>
              <tr class="info">
                <th><center>No </center></th>
                <th><center>Nama Peminjam </center></th>
                <th><center>Tanggal Pinjam </center></th>
                <th><center>Batas Peminjaman </center></th>
                <th><center>Status Pengembalian </center></th>
              </tr>
          	</thead>
             <tbody>
            @if ($mode=="all")
         		<?php $i=1; ?>
                @foreach($daftar as $c)
                    <tr>
	                    <td><center>{{ $i++ }}</center></td>
	                    <td><center><a href="{{ url('User/pengembalian', array($c->id)) }}"><span class="fa fa-user"></span> {{ $c->nama_peminjam }}</a></a></td>
	                    <td><center>{{ $c->tgl_pinjam }}</center></td>
	                    <td><center>{{ $c->batas }}</center></td>
                      @if($c->status=="sudah kembali")
                       <td class="text text-success"><center>{{ $c->status }}</center></td>
                      @elseif($c->status=="belum kembali")
                       <td class="text text-danger"><center>{{ $c->status }}</center></td>
                      @elseif($c->status=="waiting approve")
	                     <td class="text text-warning"><center>{{ $c->status }} . . .</center></td>
                      @endif
    				</tr>
             	@endforeach
             </tbody>
        </table>
        <div class="pagination">@include('pagination.default', ['paginator' => $daftar])</div>
        @elseif ($mode=="satu")
            </tbody>
        </table>
        @endif        
    </div>

@endsection