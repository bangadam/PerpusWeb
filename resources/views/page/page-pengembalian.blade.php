@extends('layout.UserLayout')

@section('content') 

  <form enctype="multipart/form-data" action="{{ url('User/kembali', array($master['id'])) }}" method="post" name="form1">
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
        </div><!-- 
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label"></label>
            <label class="col-sm-2 col-sm-2 control-label">Judul</label>
            <label class="col-sm-4 col-sm-4 control-label">Total</label>
        </div> -->
        <!-- <div class="panel-body table-responsive"> -->
          <table id="example" class="table table-hover table-bordered table-responsive">
            <thead>
              <tr>
                <th><center> ID Buku</center></th>
                <th><center> Judul</center></th>
                <th><center> Total</center></th>
              </tr>
            </thead>
            @if($master['status']=="sudah kembali")
              <tbody>
              @foreach($detail as $d)
                <tr>
                  <td><center>{{ $d['id_buku'] }}</center></td>
                  <td><center>{{ $d['nama_buku'] }}</center></td>
                  <td><center>{{ $d['total'] }}</center></td>
                </tr>
              @endforeach
              </tbody>
              @foreach($detail as $d)
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-4">
                      <input class="form-control" name="buku[]" type="hidden" value="{{ $d['nama_buku'] }}" readonly="readonly" />
                  </div>
                  <div class="col-sm-4">
                      <input class="form-control" name="total[]" type="hidden" value="{{ $d['total'] }}" readonly="readonly" />
                  </div>
              </div>
              @endforeach
            @elseif($master['status']=="belum kembali")
              @if($detail[0]['batas']<date('Y-m-d'))
                <tbody>
                @for($i=0; $i<count($detail); $i++)
                  <tr>
                    <td><center>{{ $detail[$i]['id_buku'] }}</center></td>
                    <td><center>{{ $detail[$i]['nama_buku'] }}</center></td>
                    <td><center>{{ $total[$i] }}</center></td>
                  </tr>
                @endfor
                </tbody>
                @for($i=0;$i<count($detail);$i++)
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-4">
                          <input class="form-control" name="buku[]" type="hidden" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                      </div>
                      <div class="col-sm-4">
                          <input class="form-control" name="total[]" type="hidden" value="{{ $total[$i] }}" readonly="readonly" />
                      </div>
                  </div>
                @endfor
              @elseif($detail[0]['batas']>=date('Y-m-d'))
                <tbody>
                @for($i=0; $i<count($detail); $i++)
                  <tr>
                    <td><center>{{ $detail[$i]['id_buku'] }}</center></td>
                    <td><center>{{ $detail[$i]['nama_buku'] }}</center></td>
                    <td><center>{{ $total[$i] }}</center></td>
                  </tr>
                @endfor
                </tbody>
                @for($i=0; $i<count($detail);$i++)
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-4">
                          <input class="form-control" name="buku[]" type="hidden" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                      </div>
                      <div class="col-sm-4">
                          <input class="form-control" name="total[]" type="hidden" value="{{ $total[$i] }}" readonly="readonly" />
                      </div>
                  </div>
                @endfor
              @endif
            @elseif($master['status']=="waiting approve")
                <tbody>
                @for($i=0; $i<count($detail); $i++)
                  <tr>
                    <td><center>{{ $detail[$i]['id_buku'] }}</center></td>
                    <td><center>{{ $detail[$i]['nama_buku'] }}</center></td>
                    <td><center>{{ $detail[$i]['total'] }}</center></td>
                  </tr>
                @endfor
                </tbody>
                @for($i=0; $i<count($detail);$i++)
                  <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-4">
                          <input class="form-control" name="buku[]" type="hidden" value="{{ $detail[$i]['nama_buku'] }}" readonly="readonly" />
                      </div>
                      <div class="col-sm-4">
                          <input class="form-control" name="total[]" type="hidden" value="{{ $detail[$i]['total'] }}" readonly="readonly" />
                      </div>
                  </div>
                @endfor
            @endif
          </table>
        <!-- </div> -->
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Status Pengembalian</label>
            <div class="col-sm-8">
                <input class="form-control" name="status" type="text" value="{{ $master['status'] }}" readonly="readonly" />
            </div>
        </div>
        @if($master['status']=="sudah kembali")
          <div class="form-group" style="margin-bottom: 20px;">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-8">
                <a href="{{ url('User/Daftar/pinjam', array(Auth::user()->username)) }}">
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
              <label class="col-sm-8">Segera Kembalikan Bukunya agar denda tidak terlalu mahal</label>
            @endif
          </div>
          <div class="form-group" style="margin-bottom: 20px;">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-4">
                <input type="submit" value="Kembalikan" class="btn btn-block btn-sm btn-primary" />
              </div>
              <div class="col-sm-4">
                <a href="{{ url('User/Daftar/pinjam', array(Auth::user()->username)) }}">
                  <input type="button" value="Batal" class="btn btn-block btn-sm btn-danger" />
                </a>
              </div>
          </div>
        @elseif($master['status']=="waiting approve")
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Note :</label>
            <label class="col-sm-8">Menunggu Konfirmasi dari Petugas</label>
          </div>
          <div class="form-group" style="margin-bottom: 20px;">
            <label class="col-sm-2 col-sm-2 control-label"></label>
            <div class="col-sm-4">
              <a href="{{ url('User/Daftar/pinjam', array(Auth::user()->username)) }}">
              <input type="button" value="OK" class="btn btn-block btn-sm btn-primary" />
              </a>
            </div>
            <div class="col-sm-4">
              <a href="{{ url('User/Daftar/pinjam', array(Auth::user()->username)) }}">
                <input type="button" value="Batal" class="btn btn-block btn-sm btn-danger" />
              </a>
            </div>
          </div>
        @endif
    </div>
  </form>

@endsection