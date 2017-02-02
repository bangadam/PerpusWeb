@extends('layout.FrontAdmin')

@section('content')

<aside class="right-side">

      <section class="content">

          <div class="row">
              <div class="col-xs-12">
                  <div class="panel panel-primary">
                      <header class="panel-heading">
                          <b>Transaksi</b>

                      </header>
                      
                      <div class="panel-body">
                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{ url('Transaksi') }}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label class="col-sm-4 col-sm-4 control-label" for="jum_buku">Jumlah Buku yang Dipinjam</label>
                              <div class="col-sm-8">
                                <div class="col-sm-9">
                                 <select class="form-control" name="buku">
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                                   <option>5</option>
                                   <option>6</option>
                                   <option>7</option>
                                   <option>8</option>
                                   <option>9</option>
                                   <option>10</option>
                                   <option>11</option>
                                   <option>12</option>
                                 </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label"></label>
                                <div class="col-sm-1">
                                  <input type="submit" id="nama" class="btn btn-md btn-block btn-primary" value="OK" />
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
@endsection