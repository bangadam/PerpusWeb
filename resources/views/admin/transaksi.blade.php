@extends ('layout.FrontAdmin')

@section ('content')

<aside class="right-side">

                <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    <b>List Transaksi</b>

                </header>
                <div class="panel-body table-responsive">
                  <div class="box-tools m-b-15">
                    <form action="{{ url('mencari') }}" method="GET">
                        <div class="input-group">
                        <input type='text' class="form-control input-sm pull-right" style="width: 210px;"  name='cari' placeholder='Cari berdasarkan Nama Peminjam' required /> 
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>    
                  </div>
                <table id="example" class="table table-hover table-bordered">
                  <thead>
                     <tr>
                        <th><center>No </center></th>
                        <th><center>Nama Peminjam </center></th>
                        <th><center>Tanggal Peminjaman </center></th>
                        <th><center>Batas Peminjaman </center></th>
                        <th><center>Status </center></th>
                      </tr>
                  </thead>
                    @if($mode=="all")
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($transaksi as $d)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a href="{{ url('Detail', array($d['id'])) }}"><span class="fa fa-user"></span> {{ $d['nama_peminjam'] }}</a></td> 
                                <td>{{ $d['tgl_pinjam'] }}</td>
                                <td>{{ $d['batas'] }}</td>
                                @if($d['status']=="sudah kembali")
                                <td><span class="label label-success"><i class="fa fa-check"></i> {{ $d['status'] }}</span></td>
                                @elseif($d['status']=="belum kembali")
                                <td><span class="label label-danger"><i class="fa fa-times"></i> {{ $d['status'] }}</span></td>
                                @elseif($d['status']=="waiting approve")
                                <td><span class="text text-danger"><i class="glyphicon glyphicon-repeat fa-spin"></i> {{ $d['status'] }} . . . .</span></td>
                                @endif
                            </tr>
                        @endforeach
                       </tbody>
                       </table>
                       <div class="pagination">@include('pagination.default', ['paginator' => $transaksi])</div>
                   
                    @elseif($mode=="cari")
                        @if(count($hasil) > 0)
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($hasil as $c)
                            <tr>
                                <td>{{{ $i++ }}}</td>
                                <td><a href="{{ url('Detail', array($c['id'])) }}"><span class="fa fa-user"></span> {{ $c['nama_peminjam'] }}</a></td> 
                                <td>{{ $c['tgl_pinjam'] }}</td>
                                <td>{{ $c['tgl_kembali'] }}</td>
                                @if($c['status']=="sudah kembali")
                                <td><span class="label label-success">{{ $c['status'] }}</span></td>
                                @elseif($c['status']=="belum kembali")
                                <td><span class="label label-danger">{{ $c['status'] }}</span></td>
                                @elseif($c['status']=="waiting approve")
                                <td><span class="text text-danger"><i class="fa fa-refresh fa-spin"></i> {{ $c['status'] }} . . . .</span></td>
                                @endif
                            </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="5">Hasil Pencarian Kosong</td>
                                </tr>
                            </tbody>
                        @endif
                        </table>
                   
                    @endif
 
                </div>
            </div>
        </div>
    </div>

</section>


@endsection