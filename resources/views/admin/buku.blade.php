@extends ('../layout/FrontAdmin')

@section ('content')

<aside class="right-side">

                <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                <header class="panel-heading">
                    <b>List Buku</b>
                </header>
                <div class="panel-body table-responsive">
                  <div class="box-tools m-b-15">
                    <form action="{{ url('pencarian') }}" method="GET">
                        <div class="input-group">
                        <input type='text' class="form-control input-sm pull-right" style="width: 200px;"  name='cari' placeholder='Cari berdasarkan Judul Buku' required /> 
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>    
                  </div>
                  <div class="form-group">
                    <form enctype="multipart/form-data" action="{{ url('print') }}" method="get" name="form1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-print"></i>  Print to PDF</button>
                          </div>
                    </form>    
                    <form enctype="multipart/form-data" action="{{ url('print-excel') }}" method="get" name="form1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print"></i>  Print to Excel</button>
                          </div>
                    </form>    
                  </div>
                  <div class="form-group">
                    <div class="col-md-12"></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12"></div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12"></div>
                  </div>

                <table id="example2" class="table table-hover table-striped table-bordered">
                  <thead>
                     <tr>
                        <th><center>Judul </center></th>
                        <th><center>Pengarang </center></th>
                        <th><center>Tahun Terbit </center></th>
                        <th><center>Penerbit </center></th>
                        <th><center>Jumlah </center></th>
                        <th><center>Lokasi </center></th>
                      </tr>
                  </thead>
                    @if($mode=="all")
                        <tbody>
                        @foreach($buku as $c)
                            <tr>
                                <td><a href="{{ url('View', array($c['id'])) }}"><span class="fa fa-book"></span> {{ $c['judul'] }}</a></td>
                                <td>{{ $c['pengarang'] }}</td>
                                <td>{{ $c['th_terbit'] }}</td>
                                <td>{{ $c['penerbit'] }}</td>
                                <td>{{ $c['jumlah_buku'] }}</td>
                                <td>{{ $c['lokasi'] }}</td>
                            </tr>
                        @endforeach
                       </tbody>
                    <!-- <tfoot>
                     <tr>
                        <th><center>Judul </center></th>
                        <th><center>Pengarang </center></th>
                        <th><center>Tahun Terbit </center></th>
                        <th><center>Penerbit </center></th>
                        <th><center>Jumlah </center></th>
                        <th><center>Lokasi </center></th>
                      </tr>
                    </tfoot> -->
                       </table>
                    <div class="pagination">@include('pagination.default', ['paginator' => $buku])</div>
                    @elseif($mode=="cari")
                        @if(count($hasil) > 0)
                            <tbody>
                            @foreach($hasil as $c)
                            <tr>
                                <td><a href="{{ url('update', array($c['id'])) }}"><span class="fa fa-book"></span> {{ $c->judul }}</a></td>
                                <td>{{ $c->pengarang }}</td>
                                <td>{{ $c->th_terbit }}</td>
                                <td>{{ $c->penerbit }}</td>
                                <td>{{ $c->jumlah_buku }}</td>
                                <td>{{ $c->lokasi}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div class="pagination">@include('pagination.default', ['paginator' => $hasil])</div>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="6">Hasil Pencarian Kosong</td>
                                </tr>
                            </tbody>
                        @endif
                    </table>
                        <center><h4>Buku yg ditemukan : {{ count($hasil) }} dari {{ count($buku) }} </h4> </center>
                    @endif

                   
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
<!-- row end -->
</section><!-- /.content -->


@endsection