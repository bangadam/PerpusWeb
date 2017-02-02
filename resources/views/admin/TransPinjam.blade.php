@extends('layout.FrontAdmin')

@section('content')
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script async='async' type='text/javascript'>
$(document).ready(function(){
  $("#sKelas").change(function(){
    var cari = $("#sKelas").val();
    cariJenis(cari);
  })
  
  function cariJenis(e){
    var cari = e;
    var token = $('#token').val();
    $.ajax({
      type    : "POST",
      url     : "{!! URL::to('kelas') !!}",
      headers :{'X-CSRF-TOKEN':token},
      data    : "kelas="+cari,
      dataType: "json",
      success : function(nama){
        $("#sNama").html(nama);
      }
    });
  }

@for($i=0; $i<$jum; $i++)
  $("#sKode<?=$i?>").change(function(){
    var cari = $("#sKode<?=$i?>").val();
    cariKode<?=$i?>(cari);
    //alert(<?=$i?>);
  })

  function cariKode<?=$i?>(e){
    var cari = e;
    var token = $('#token').val();
    $.ajax({
      type    : "POST",
      url     : "{!! URL::to('kode') !!}",
      headers :{'X-CSRF-TOKEN':token},
      data    : "kode="+cari,
      dataType: "json",
      success : function(kode){
        //console.log(kode)
        $("#sJudul<?=$i?>").val(kode.judul);
        $("#sPengarang<?=$i?>").val(kode.pengarang);
        $("#sThn_Terbit<?=$i?>").val(kode.terbit);
      }
    });
  }

@endfor

});
</script>
<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel panel-primary">
                      <header class="panel-heading">
                          <b>Transaksi</b>

                      </header>
                      
                      <div class="panel-body">
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('Transaksi Pinjam') }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="kelas" id="sKelas" required>
                                      <option value=""> -Kelas-</option>
                                      @foreach($kelas as $k)
                                      <option value="{{{ $k['id_kelas'] }}}"> {{{ $k['kelas'] }}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                                <div class="col-sm-2">
                                    <input name="tgl_pinjam" class="form-control" type="text" value="{{ date('d F Y') }}" readonly="readonly" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="nama" id="sNama" required>
                                    </select>
                                </div>
                                <div class="col-sm-2"></div>
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
                                <div class="col-sm-2">
                                    <input name="tgl_kembali" class="form-control" type="text" value="{{ date('d F Y', strtotime('+7 day')) }}" readonly="readonly" required />
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <table id="example" class="table table-hover">
                                  <thead>
                                    <tr class="info">
                                      <th><center> ID Buku</center></th>
                                      <th><center> Judul</center></th>
                                      <th><center> Pengarang</center></th>
                                      <th><center> Tahun Terbit</center></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @for($i=0; $i<$jum; $i++)
                                    <tr>
                                      <td>
                                        <select class="form-control" name="id[]" id="sKode<?=$i?>" required>
                                          <option value=""> -ID Buku-</option>
                                          @foreach($buku as $b)
                                          <option value="{{{ $b['id'] }}}"> {{{ $b['id'] }}}</option>
                                          @endforeach
                                        </select>
                                      </td>
                                      <td><input name="judul[]" placeholder="Judul Buku" type="text" id="sJudul<?=$i?>" class="form-control" required /></td>
                                      <td><input name="pengarang[]" placeholder="Pengarang Buku" type="text" id="sPengarang<?=$i?>" class="form-control" required /></td>
                                      <td><input name="th_terbit[]" placeholder="Tahun Terbit" type="text" id="sThn_Terbit<?=$i?>" class="form-control" required /></td>
                                    </tr>
                                  @endfor
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label"></label>
                                <div class="col-sm-2">
                                  <input type="submit" id="nama" class="btn btn-sm btn-block btn-primary" value="PINJAM" />
                                </div>
                                <div class="col-sm-2">
                                  <input type="reset" id="nama" class="btn btn-sm btn-block btn-danger" value="BATAL" />
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
@endsection