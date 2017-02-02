@extends('layout.FrontAdmin')

@section('content')

@if($jenis=="input")

<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel panel-primary">
                      <header class="panel-heading">
                          <b>Input Buku</b>

                      </header>
                      
                      <div class="panel-body">
                          <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('insert') }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          	<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                                  <div class="col-sm-8">
                                      <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-8">
                                      <input name="judul" type="text" id="judulBuku" class="form-control" placeholder="Judul" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                  <div class="col-sm-8">
                                      <input name="pengarang" type="text" id="pengarang" class="form-control" placeholder="Nama Pengarang" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" name="th_terbit" required>
                                      <option value=""> ~Tahun Terbit~</option>
                                      @for($i=date("Y"); $i>=1900; $i--)
                                      <option value="{{ $i }}"> {{{ $i }}}</option>
                                      @endfor
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                  <div class="col-sm-8">
                                      <input name="penerbit" type="text" id="penerbit" class="form-control" placeholder="Penerbit" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Kategori Buku</label>
                                  <div class="col-sm-8">
                                      <select class="form-control" name="kategori" id="kategori" required>
                                      <option> -- Pilih Salah Satu --</option>
                                      <option value="Sejarah"> Sejarah </option>
                                      <option value="Sekolah"> Sekolah </option>
                                      <option value="Sains"> Sains </option>
                                      <option value="Pengetahuan"> Pengetahuan </option>
                                      <option value="Teknologi"> Teknologi </option>
                                      <option value="Cerita"> Cerita/Novel </option>
                                      <option value="Umum"> Umum </option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                                  <div class="col-sm-8">
                                      <input name="jum_buku" class="form-control" id="jum_buku" type="number" placeholder="Jumlah Buku Saat Ini" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                                  <div class="col-sm-8">
                                      <input name="tgl_input" class="form-control" id="tgl_input" type="text" value="{{ date('Y-m-d') }}" readonly="readonly" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Gambar Sampul Buku</label>
                                  <div class="col-sm-4">
                                    <span class="btn  btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Upload Image</span>
                                      <input type="file"name='sampul' accept=".jpg,.png,.gif, | image/*" required />
                                    </span>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="comment" class="col-sm-2 col-sm-2 control-label">Rangkuman:</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="rangkuman" rows="5" id="comment"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <input type="submit" value="Simpan" class="btn btn-md btn-success" />&nbsp;
                                   <a href="{{ url('Data Buku') }}"><input type="button" class="btn btn-danger" value="batal" /></a>
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
<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel">
                      <header class="panel-heading">
                          <b>Update Buku</b>

                      </header>
                      
                      <div class="panel-body">
                          <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('insert', array($bk['id'])) }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                                  <div class="col-sm-8">
                                      <input name="id" type="text" id="id" class="form-control" value="{{ $bk['id'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-8">
                                      <input name="judul" type="text" id="judul" class="form-control" value="{{ $bk['judul'] }}" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                  <div class="col-sm-8">
                                      <input name="pengarang" type="text" id="pengarang" class="form-control" value="{{ $bk['pengarang'] }}" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                  <div class="col-sm-8">
                                      <input name="th_terbit" type="text" id="th_terbit" class="form-control" value="{{ $bk['th_terbit'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                  <div class="col-sm-8">
                                      <input name="penerbit" type="text" id="penerbit" class="form-control" value="{{ $bk['penerbit'] }}" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Kategori Buku</label>
                                  <div class="col-sm-8">
                                      <input name="kategori" type="text" id="kategori" class="form-control" value="{{ $bk['kategori'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Sementara Buku</label>
                                  <div class="col-sm-8">
                                      <input name="jum_buku" class="form-control" id="jum_buku" type="text" value="{{ $bk['jumlah_buku'] }}" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Update</label>
                                  <div class="col-sm-8">
                                      <input name="tgl_input" class="form-control" id="tgl_input" type="text" value="{{ date('Y-m-d') }}" readonly="readonly" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Gambar Sampul Buku</label>
                                  @if($bk['gambar']=="")
                                  <div class="col-sm-8">
                                    <span class="btn btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                                      <input type="file"name='sampul' required />
                                    </span>
                                  </div>
                                  @else
                                  <div class="col-md-4">
                                    <img src="{{ asset($bk['gambar']) }}" width="150" height="150" class="img-circle" >
                                      <span class="btn  btn-info btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                                        <input type="file"name='sampul' required />
                                      </span>*
                                  </div>
                                  @endif
                              </div>
                              <div class="form-group">
                                <label for="comment" class="col-sm-2 col-sm-2 control-label">Rangkuman:</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="rangkuman" rows="5" id="comment">{{ $bk['rangkuman'] }}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label"></label>
                                  <div class="col-sm-8">
                                      *<span class="label label-danger">Note : harap update juga foto sampul</span>
                                  </div>
                              </div>
                              <div class="form-group" style="margin-bottom: 20px;">
                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <input type="submit" value="Simpan" class="btn btn-md btn-success" />&nbsp;
                                   <a href="{{ url('Data Buku') }}"><input type="button" class="btn btn-md btn-danger" value="Batal" /></a>
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
<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel">
                      <header class="panel-heading">
                          <b>Update Buku</b>

                      </header>
                      
                      <div class="panel-body">
                          <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('Data Buku') }}" method="GET" enctype="multipart/form-data" name="form1" id="form1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                                  <div class="col-sm-8">
                                      <input name="id" type="text" id="id" class="form-control" value="{{ $bk['id'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-8">
                                      <input name="judul" type="text" id="judul" class="form-control" value="{{ $bk['judul'] }}" readonly />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                  <div class="col-sm-8">
                                      <input name="pengarang" type="text" id="pengarang" class="form-control" value="{{ $bk['pengarang'] }}" readonly />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                  <div class="col-sm-8">
                                      <input name="th_terbit" type="text" id="th_terbit" class="form-control" value="{{ $bk['th_terbit'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                  <div class="col-sm-8">
                                      <input name="penerbit" type="text" id="penerbit" class="form-control" value="{{ $bk['penerbit'] }}" readonly />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Kategori Buku</label>
                                  <div class="col-sm-8">
                                      <input name="kategori" type="text" id="kategori" class="form-control" value="{{ $bk['kategori'] }}" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Sementara Buku</label>
                                  <div class="col-sm-8">
                                      <input name="jum_buku" class="form-control" id="jum_buku" type="text" value="{{ $bk['jumlah_buku'] }}"readonly />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Update</label>
                                  <div class="col-sm-8">
                                      <input name="tgl_input" class="form-control" id="tgl_input" type="text" value="{{ date('Y-m-d') }}" readonly="readonly"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Gambar Sampul Buku</label>
                                  <div class="col-md-4">
                                    <img src="{{ asset($bk['gambar']) }}" width="150" height="150" class="img-circle" >
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="comment" class="col-sm-2 col-sm-2 control-label">Rangkuman:</label>
                                <div class="col-sm-8">
                                  <textarea class="form-control" name="rangkuman" rows="5" id="comment" readonly>{{ $bk['rangkuman'] }}</textarea>
                                </div>
                              </div>
                              <div class="form-group" style="margin-bottom: 20px;">
                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <input type="submit" value="Kembali" class="btn btn-md btn-success" />&nbsp;
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