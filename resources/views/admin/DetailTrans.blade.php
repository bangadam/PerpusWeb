@extends('layout.FrontAdmin')

@section('content')

<aside class="right-side">

    <section class="content">

    <div class="row">
    <div class="col-xs-12">
    <div class="panel panel-primary">
        <header class="panel-heading">
            <b>Detail Transaksi</b>

        </header>
    <div class="panel-body table-responsive">
    @if($master['status']=="waiting approve" || $master['status']=="belum kembali")
      <div class="form-group">
        
      </div>
    @else
      <div class="form-group">
      <form action="{{ url('Print-to-PDF', array($master['id'])) }}" method="get">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-2">
              <button type="submit" class="btn btn-danger btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i>  Print to PDF</button>
            </div>
      </form>    
      <form action="{{ url('print-to-excel', array($master['id'])) }}" method="get">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-10">
              <button type="submit" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-print"></i>  Print to Excel</button>
            </div>
      </form>    
    </div>
    @endif
    <div class="form-group">
      <div class="col-md-12"></div>
    </div>
    <div class="form-group">
      <div class="col-md-12"></div>
    </div>
    <div class="form-group">
      <div class="col-md-12"></div>
    </div>
    <div style="margin-top: 20px; margin-bottom: 10px;"></div>
        <form enctype="multipart/form-data" action="{{ url('pengembalian', array($master['id'])) }}" method="post" name="form1">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">   
          <div class="form-horizontal style-form" style="margin-top: 20px;">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID</label>
                    <div class="col-sm-8">
                        <input name="id" type="text" id="id" class="form-control" value="{{ $master['id'] }}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
                    <div class="col-sm-8">
                        <input type="text" name="peminjam" class="form-control" value="{{ $master['nama_peminjam'] }}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                    <div class="col-sm-8">
                        <input type="text" name="tgl-pinjam" class="form-control" value="{{ $master['tgl_pinjam'] }}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Batas Peminjaman</label>
                    <div class="col-sm-8">
                        <input type="text" name="batas" class="form-control" value="{{ $master['batas'] }}" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Buku yang Dipinjam</label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                    <label class="col-sm-4 col-sm-4 control-label">Total</label>
                </div>
                @if($master['status']=="sudah kembali")
                    @foreach($detail as $d)
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <input class="form-control" name="buku[]" type="text" value="{{ $d['nama_buku'] }}" readonly="readonly" />
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="total[]" type="text" value="{{ $d['total'] }}" readonly="readonly" />
                        </div>
                    </div>
                    @endforeach
                @elseif($master['status']=="waiting approve")
                   @if($detail[0]['batas']<date('Y-m-d'))
                    @for($i=0; $i<count($detail);$i++)
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-4">
                              <input class="form-control" name="buku[]" type="text" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                          </div>
                          <div class="col-sm-4">
                              <input class="form-control" name="total[]" type="text" value="{{ $den[$i] }}" readonly="readonly" />
                          </div>
                      </div>
                    @endfor
                  @elseif($detail[0]['batas']>=date('Y-m-d'))
                    @for($i=0; $i<count($detail);$i++)
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-4">
                              <input class="form-control" name="buku[]" type="text" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                          </div>
                          <div class="col-sm-4">
                              <input class="form-control" name="total[]" type="text" value="{{ $total[$i] }}" readonly="readonly" />
                          </div>
                      </div>
                    @endfor
                  @endif
                @elseif($master['status']=="belum kembali")
                  @if($detail[0]['batas']<date('Y-m-d'))
                    @for($i=0; $i<count($detail);$i++)
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-4">
                              <input class="form-control" name="buku[]" type="text" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                          </div>
                          <div class="col-sm-4">
                              <input class="form-control" name="total[]" type="text" value="{{ $total[$i] }}" readonly="readonly" />
                          </div>
                      </div>
                    @endfor
                  @elseif($detail[0]['batas']>=date('Y-m-d'))
                    @for($i=0; $i<count($detail);$i++)
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-4">
                              <input class="form-control" name="buku[]" type="text" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                          </div>
                          <div class="col-sm-4">
                              <input class="form-control" name="total[]" type="text" value="{{ $total[$i] }}" readonly="readonly" />
                          </div>
                      </div>
                    @endfor
                  @endif
                @endif
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status Pengembalian</label>
                    <div class="col-sm-8">
                      @if($master['status']=="waiting approve")
                        <span class="text text-danger"><i class="fa fa-refresh fa-spin"></i> {{ $master['status'] }} . . . .</span>
                      @elseif($master['status']=="belum kembali")
                        <span class="text text-danger"><i class="fa fa-times"></i> {{ $master['status'] }}</span>
                      @else
                        <span class="text text-success"><i class="fa fa-check"></i> {{ $master['status'] }}</span>
                      @endif
                    </div>
                </div>
                @if($master['status']=="sudah kembali")
                  <div class="form-group" style="margin-bottom: 20px;">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-1">
                        <a href="{{ url('Data Transaksi') }}">
                          <input type="button" value="Ok" class="btn btn-block btn-sm btn-primary" />
                        </a>
                      </div>
                  </div>
                @elseif($master['status']=="belum kembali")
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Note :</label>
                    @if($detail[0]['batas']>=date('Y-m-d'))
                      <label class="col-sm-8"></label>
                    @elseif($detail[0]['batas']<date('Y-m-d'))
                      <label class="col-sm-8">Segera Beritahu Peminjam agar denda tidak terlalu mahal</label>
                    @endif
                </div>
                  <div class="form-group" style="margin-bottom: 20px;">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-1">
                        <a href="{{ url('Data Transaksi') }}">
                          <input type="button" value="Ok" class="btn btn-block btn-sm btn-danger" />
                        </a>
                      </div>
                  </div>
                @elseif($master['status']=="waiting approve")
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Note :</label>
                  </div>
                  <div class="form-group" style="margin-bottom: 20px;">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <input type="submit" value="Sudah Kembali" class="btn btn-md btn-primary" />
                      <a href="{{ url('Data Transaksi') }}">
                        <input type="button" value="Batal" class="btn btn-md btn-danger" />
                      </a>
                    </div>
                  </div>
                @endif
              <div style="margin-top: 20px;"></div>
            </div>
          </form>  
        </div>
    </div>
    </div>
    </div>

</section>

@endsection