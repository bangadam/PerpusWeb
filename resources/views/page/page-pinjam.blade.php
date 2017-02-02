@extends('layout.UserLayout')

@section('content')
<div class="panel-body">
    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('User/peminjaman') }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	@for($i=0; $i<count($buku); $i++)
        <div class="form-group">
            <!-- <label class="col-sm-2 col-sm-2 control-label">ID Buku</label> -->
            <div class="col-sm-8">
                <input name="id[]" type="hidden" id="id" class="form-control" value="{{ $buku[$i]['id'] }}" readonly="readonly" />
            </div>
        </div>
        <div class="form-group">
            <!-- <label class="col-sm-2 col-sm-2 control-label">Judul</label> -->
            <div class="col-sm-8">
                <input name="judul[]" type="hidden" id="judul" class="form-control" value="{{ $buku[$i]['judul'] }}" readonly="readonly" />
            </div>
        </div>
      @endfor
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
            <div class="col-sm-2">
                <input name="nama" class="form-control" type="text" value="{{ Auth::user()->username }}" readonly="readonly" required />
            </div>
            <div class="col-sm-2"></div>
            <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
            <div class="col-sm-2">
                <input name="tgl_pinjam" class="form-control" type="text" value="{{ date('d F Y') }}" readonly="readonly" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
            <div class="col-sm-2">
                <input name="kelas" class="form-control" type="text" value="{{ Auth::user()->kelas.' '.Auth::user()->jurusan }}" readonly="readonly" required />
            </div>
            <div class="col-sm-2"></div>
            <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
            <div class="col-sm-2">
                <input name="tgl_kembali" class="form-control" type="text" value="{{ date('d F Y', strtotime('+7 day')) }}" readonly="readonly" required />
            </div>
        </div>

        <div class="panel-body table-responsive">
          <table id="example" class="table table-hover table-responsive">
            <thead>
              <tr>
                <th><center> ID Buku</center></th>
                <th><center> Judul</center></th>
                <th><center> Pengarang</center></th>
                <th><center> Tahun Terbit</center></th>
              </tr>
            </thead>
            <tbody>
            @for($i=0; $i<count($buku); $i++)
              <tr>
                <td><center>{{ $buku[$i]['id'] }}</center></td>
                <td><center>{{ $buku[$i]['judul'] }}</center></td>
                <td><center>{{ $buku[$i]['pengarang'] }}</center></td>
                <td><center>{{ $buku[$i]['th_terbit'] }}</center></td>
              </tr>
            @endfor
            </tbody>
          </table>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label"></label>
          <div class="col-sm-4">
              <input type="submit" value="Pinjam" class="btn btn-block btn-md btn-success" />&nbsp;
          </div>
          <div class="col-sm-4">
             <a href="{{ url('User/index') }}"><input type="button" class="btn btn-block btn-md btn-danger" value="Batal" />
          </div>

        </div>
        <div style="margin-top: 20px;"></div>
    </form>
</div>
@endsection