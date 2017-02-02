@extends('layout.FrontAdmin')

@section('content')

@if($jenis=="input")
 <script type="text/javascript">
  function confirm(form) {
    if (form.pass.value != form.pass_confirm.value) {
      alert("Password yg anda masukkan tidak sama");
      form.pass_confirm.focus();
      return (false);
    }
    

      return (true);
  }

    function Show() {
    if (document.getElementById('radio1').checked) {
        document.getElementById('pass').type = 'password';
    } 
    else if (document.getElementById('radio2').checked) {
        document.getElementById('pass').type = 'text';
    }
  }
  
   function ShowHide1() {
    if (document.getElementById('radio4').checked) {
        document.getElementById('confirm').type = 'text';
    } else if (document.getElementById('radio3').checked) {
        document.getElementById('confirm').type = 'password';
    }
  }
  
</script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#date').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>
<aside class="right-side">

                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-primary">
                                <header class="panel-heading">
                                    <b>Input Anggota</b>

                                </header>
                                
                                <div class="panel-body">
                      <form class="form-horizontal style-form" onsubmit="return confirm(this)" style="margin-top: 20px;" action="{{ url('input') }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi"  readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Induk</label>
                              <div class="col-sm-8">
                                  <input name="no_induk" type="text" id="no_induk" class="form-control" value="{{ rand(1111, 9999) }}" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-8">
                                  <input name="nama" autofocus="on" type="text" id="nama" class="form-control" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-8">
                                  <input name="pass" type="password" id="pass" class="form-control "  required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                    <input type="radio" name="RB" id="radio1" onchange="Show();" checked /><span class="luar"><span class="dalam"></span></span> <label for="radio1">Hide</label>&nbsp;&nbsp;
                                    <input type="radio" name="RB" id="radio2" onchange="Show();" /> <label for="radio2">Show</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                              <div class="col-sm-8">
                                  <input name="pass_confirm" type="password" id="confirm" class="form-control" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="radio" name="RB2" id="radio3" onchange="ShowHide1();" checked="checked" /> <label for="radio3">Hide</label>&nbsp;&nbsp;
                                  <input type="radio" name="RB2" id="radio4" onchange="ShowHide1();" /> <label for="radio4">Show</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas/Jurusan</label>
                              <div class="col-sm-2">
                                  <select class="form-control" name="kelas" id="jk">
                                  <option> -- Kelas --</option>
                                  <option value="X"> X</option>
                                  <option value="XI"> XI</option>
                                  <option value="XII"> XII</option>
                                  </select>
                              </div>
                              <div class="col-sm-3">
                                  <select class="form-control" name="jurusan" id="jk">
                                  <option> -- Jurusan --</option>
                                  <option value="TKJ"> Teknik Komputer dan Jaringan</option>
                                  <option value="MM"> Multimedia</option>
                                  <option value="RPL"> Rekayasa Perangkat Lunak</option>
                                  <option value="ANM"> Animasi</option>
                                  <option value="JB"> Jasa Boga</option>
                                  <option value="APH"> Akomodasi Perhotelan</option>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select class="form-control" name="no" id="jk">
                                  <option> ----</option>
                                  <option value="1"> 1</option>
                                  <option value="2"> 2</option>
                                  <option value="3"> 3</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="jk" id="jk">
                                  <option> -- Pilih Salah Satu --</option>
                                  <option value="L"> Laki - Laki</option>
                                  <option value="P"> Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat Tanggal Lahir</label>
                              <div class="col-sm-3">
                                  <select class="form-control" name="place">
                                    <option> -- Pilih Kota Lahir --</option>
                                    <option value="mjk"> Mojokerto</option>
                                    <option value="sby"> Surabaya</option>
                                    <option value="mlg"> Malang</option>
                                    <option value="jmg"> Jombang</option>
                                    <option value="psr"> Pasuruan</option>
                                    <option value="gsk"> Gresik</option>
                                    <option value="lmg"> Lamongan</option>
                                  </select>
                              </div>
                              <div class="col-sm-5">
                                <div class="col-sm-4">
                                  <select class="form-control" name="tgl">
                                    <option> -- Tanggal --</option>
                                    @for($i=1;$i<=31;$i++)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" name="bln">
                                    <option> -- Bulan --</option>
                                    <option value="januari"> Januari</option>
                                    <option value="februari"> Februari</option>
                                    <option value="maret"> Maret</option>
                                    <option value="april"> April</option>
                                    <option value="mei"> Mei</option>
                                    <option value="juni"> Juni</option>
                                    <option value="juli"> Juli</option>
                                    <option value="agustus"> Agustus</option>
                                    <option value="september"> September</option>
                                    <option value="oktober"> Oktober</option>
                                    <option value="november"> November</option>
                                    <option value="desember"> Desember</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" name="thn">
                                    <option> -- Tahun --</option>
                                    @for($i=2016;$i>=1000;$i--)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <input name="alamat" class="date-picker form-control" id="date" type="text" placeholder="Alamat" required />
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Type</label>
                            <div class="col-sm-8">
                                  <p class="form-control-static">User</p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                  <p class="form-control-static">Active</p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Foto Profile</label>
                            <div class="col-sm-8">
                              <span class="btn  btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                                <input type="file" name='foto' required accept="image/*">
                              </span>
                            </div>
                          </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                                <input type="reset" class="btn btn-sm btn-danger" value="Batal" />
                              </div>
                          </div>
                          <div style="margin-top: 20px;"></div>
                      </form>
                                </div>
                            </div>
                        </div>
                    </div>
           
                </section>

@elseif($jenis=="update")
 <script type="text/javascript">
  function konfirmasi(form) {
    if(form.old.value != form.hide.value) {
      alert("Password yg anda masukkan SALAH !!");
      form.old.focus();
      return(false);
    } else if (form.password.value != form.pass_confirm.value) {
      alert("Password yg anda masukkan tidak sama");
      form.password.focus();
      return(false);
    } else
      return(true);
  }
  function Show1() {
    if (document.getElementById('radio5').checked) {
        document.getElementById('pass_old').type = 'password';
    } 
    else if (document.getElementById('radio6').checked) {
        document.getElementById('pass_old').type = 'text';
    }
  }
  function Show2() {
    if (document.getElementById('radio7').checked) {
        document.getElementById('pass').type = 'password';
    } 
    else if (document.getElementById('radio8').checked) {
        document.getElementById('pass').type = 'text';
    }
  }
  function ShowHide2() {
    if (document.getElementById('radio0').checked) {
        document.getElementById('confirm').type = 'text';
    } else if (document.getElementById('radio9').checked) {
        document.getElementById('confirm').type = 'password';
    }
  }
</script>
<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel panel-primary">
                      <header class="panel-heading">
                          <b>Update Anggota</b>

                      </header>
                      
                      <div class="panel-body">
            <form class="form-horizontal style-form" onsubmit="return konfirmasi(this)" style="margin-top: 20px;" action="{{ url('input', array($anggota['id'])) }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                    <div class="col-sm-8">
                      <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['id'] }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Induk</label>
                    <div class="col-sm-8">
                      <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['no_induk'] }}" readonly="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                     <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['username'] }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password lama</label>
                    <div class="col-sm-8">
                     <input name="old" autofocus="on" type="password" id="pass_old" class="form-control" require />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                          <input type="radio" name="RB3" id="radio5" onchange="Show1();" checked /><span class="luar"><span class="dalam"></span></span> <label for="radio1">Hide</label>&nbsp;&nbsp;
                          <input type="radio" name="RB3" id="radio6" onchange="Show1();" /> <label for="radio2">Show</label>
                    </div>
                 </div>


                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password baru</label>
                    <div class="col-sm-8">
                        <input name="password" type="password" id="pass" class="form-control "  required />
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                          <input type="radio" name="RB4" id="radio7" onchange="Show2();" checked /><span class="luar"><span class="dalam"></span></span> <label for="radio1">Hide</label>&nbsp;&nbsp;
                          <input type="radio" name="RB4" id="radio8" onchange="Show2();" /> <label for="radio2">Show</label>
                    </div>
                 </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                              <div class="col-sm-8">
                                  <input name="pass_confirm" type="password" id="confirm" class="form-control" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="radio" name="RB5" id="radio9" onchange="ShowHide2();" checked="checked" /> <label for="radio3">Hide</label>&nbsp;&nbsp;
                                  <input type="radio" name="RB5" id="radio0" onchange="ShowHide2();" /> <label for="radio4">Show</label>
                              </div>
                          </div>

                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas/Jurusan</label>
                              <div class="col-sm-2">
                                  <select class="form-control" name="kelas" id="jk">
                                  <option> -- Kelas --</option>
                                  <option value="X"> X</option>
                                  <option value="XI"> XI</option>
                                  <option value="XII"> XII</option>
                                  </select>
                              </div>
                              <div class="col-sm-3">
                                  <select class="form-control" name="jurusan" id="jk">
                                  <option> -- Jurusan --</option>
                                  <option value="TKJ"> Teknik Komputer dan Jaringan</option>
                                  <option value="MM"> Multimedia</option>
                                  <option value="RPL"> Rekayasa Perangkat Lunak</option>
                                  <option value="ANM"> Animasi</option>
                                  <option value="JB"> Jasa Boga</option>
                                  <option value="APH"> Akomodasi Perhotelan</option>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select class="form-control" name="no" id="jk">
                                  <option> ----</option>
                                  <option value="1"> 1</option>
                                  <option value="2"> 2</option>
                                  <option value="3"> 3</option>
                                  </select>
                              </div>
                          </div>

                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat Tanggal Lahir</label>
                              <div class="col-sm-3">
                                  <select class="form-control" name="place">
                                    <option> -- Pilih Kota Lahir --</option>
                                    <option value="mjk"> Mojokerto</option>
                                    <option value="sby"> Surabaya</option>
                                    <option value="mlg"> Malang</option>
                                    <option value="jmg"> Jombang</option>
                                    <option value="psr"> Pasuruan</option>
                                    <option value="gsk"> Gresik</option>
                                    <option value="lmg"> Lamongan</option>
                                  </select>
                              </div>
                              <div class="col-sm-5">
                                <div class="col-sm-4">
                                  <select class="form-control" name="tgl">
                                    <option> -- Tanggal --</option>
                                    @for($i=1;$i<=31;$i++)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" name="bln">
                                    <option> -- Bulan --</option>
                                    <option value="januari"> Januari</option>
                                    <option value="februari"> Februari</option>
                                    <option value="maret"> Maret</option>
                                    <option value="april"> April</option>
                                    <option value="mei"> Mei</option>
                                    <option value="juni"> Juni</option>
                                    <option value="juli"> Juli</option>
                                    <option value="agustus"> Agustus</option>
                                    <option value="september"> September</option>
                                    <option value="oktober"> Oktober</option>
                                    <option value="november"> November</option>
                                    <option value="desember"> Desember</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" name="thn">
                                    <option> -- Tahun --</option>
                                    @for($i=2016;$i>=1000;$i--)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                    @endfor
                                  </select>
                                </div>
                              </div>
                          </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8">
                      <input name="alamat" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['alamat'] }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                    @if($anggota['jk']=="L")
                    <div class="col-sm-8">
                      <p class="form-control-static">Laki - Laki</p>
                    </div>
                    @elseif($anggota['jk']=="P")
                    <div class="col-sm-8">
                      <p class="form-control-static">Perempuan</p>
                    </div>
                    @else
                    <div class="col-sm-8">
                      <p class="form-control-static">Other</p>
                    </div>
                    @endif
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type</label>
                  <div class="col-sm-8">
                    <p class="form-control-static">{{ $anggota['type'] }}" </p>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="status" id="status">
                      <option> -- Pilih Salah Satu --</option>
                      <option @if($anggota['status']=="active") selected="selected" @endif value="active"> Active</option>
                      <option @if($anggota['status']=="non-active") selected="selected" @endif value="non-active"> Non-Active</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto Profile</label>
                  @if($anggota['gambar']=="")
                  <div class="cil-md-8">
                    <span class="btn  btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                      <input type="file" name='foto' required accept="image/*">
                    </span>
                  </div>
                  @else
                  <div class="col-md-4">
                    <img src="{{ asset($anggota['gambar']) }}" width="150" height="150" class="img-thumbnail" >
                  </div>
                  @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                        <input type="submit" value="Simpan" class="btn btn-md btn-success" />&nbsp;
                    
                       <a href="{{url('Data Anggota')}}"><input type="button" class="btn btn-md btn-danger" value="Batal" /></a>
                    </div>

                </div>
                <div style="margin-top: 20px;"></div>
            </form>
        </div>
    </div>
</div>
</div>

</section>
@elseif($jenis=="View")
 <script type="text/javascript">
  function konfirmasi(form) {
    if(form.old.value != form.hide.value) {
      alert("Password yg anda masukkan SALAH !!");
      form.old.focus();
      return(false);
    } else if (form.password.value != form.pass_confirm.value) {
      alert("Password yg anda masukkan tidak sama");
      form.password.focus();
      return(false);
    } else
      return(true);
  }
  
</script>
<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel panel-primary">
                      <header class="panel-heading">
                          <b>View Anggota</b>

                      </header>
                      
                      <div class="panel-body">
            <form class="form-horizontal style-form" onsubmit="return konfirmasi(this)" style="margin-top: 20px;" action="{{ url('input', array($anggota['id'])) }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                    <div class="col-sm-8">
                      <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['id'] }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No Induk</label>
                    <div class="col-sm-8">
                      <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['no_induk'] }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                     <input name="nama" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['username'] }}" readonly/>
                    </div>
                </div>
               
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input name="text" type="text" id="pass" class="form-control "  value="{{$anggota['pass_remember']}}" readonly />
                    </div>
                 </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kelas/Jurusan</label>
                    <div class="col-sm-8">
                         <input name="text" type="text" id="pass" class="form-control "  value="{{$anggota['kelas']}}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tempat Tanggal Lahir</label>
                    <div class="col-sm-8">
                         <input name="text" type="text" id="pass" class="form-control "  value="{{$anggota['ttl']}}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8">
                      <input name="alamat" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['alamat'] }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <input name="alamat" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['jk'] }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type</label>
                  <div class="col-sm-8">
                      <input name="alamat" autofocus="on" type="text" id="nama" class="form-control" value="{{ $anggota['type'] }}" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status</label>
                  <div class="col-sm-8">
                      <input name="status" autofocus="on" type="text" id="status" class="form-control" value="{{ $anggota['status'] }}" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto Profile</label>
                  @if($anggota['gambar']=="")
                  <div class="cil-md-8">
                    <span class="btn  btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                      <input type="file" name='foto' readonly>
                    </span>
                  </div>
                  @else
                  <div class="col-md-4">
                    <img src="{{ asset($anggota['gambar']) }}" width="150" height="150" class="img-thumbnail" >
                  </div>
                  @endif
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-4">
                      <a href="{{ url('Data Anggota') }}"><input type="button" class="btn btn-md btn-danger" value="kembali" /></a>
                    </div>

                </div>
                <div style="margin-top: 20px;"></div>
            </form>
        </div>
    </div>
</div>
</div>

</section>
@endif
                

@endsection