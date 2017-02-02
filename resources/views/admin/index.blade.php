@extends('layout.FrontAdmin')

@section('content')



                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
                                    <span>{{ count($anggota) }}</span>
                                    Total Anggota
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span>{{ count($book) }}</span>
                                    Total Buku
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-spin"></i></span>
                                <div class="sm-st-info">
                                    <span>{{ count($trans) }}</span>
                                    Total Peminjaman Buku
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
                                <div class="sm-st-info">
                                    <span>{{{ $result }}}</span>
                                    Total Peminjam hari ini
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <header class="panel-heading">
                                    Daftar Peminjam yg Belum Mengembalikan
                                </header>
                                @if(count($trans) > 0)
                                    @foreach($trans as $d)
                                    <ul class="list-group teammates">
                                        <li class="list-group-item">
                                            <a><span class="fa fa-user"></span> {{ $d['nama_peminjam'] }}</a>
                                            <span class="text text-danger">belum mengembalikan Buku</span>
                                            <form class="label" action="{{ url('pengembalian', array($d['id'])) }}" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" value="kembalikan" class="btn btn-xs btn-danger">
                                            </form>
                                        </li>
                                    </ul>
                                    @endforeach
                                @else
                                    <ul class="list-group teammates">
                                        <li class="list-group-item">
                                            @if(count($transaksi) > count($trans) && count($trans)==0)
                                                <i class="fa fa-check"></i>
                                                <span class="text text-info">Semua Pengembalian tinggal menunggu konfirmasi dari <b>{{Auth::user()->username}}</b></span>
                                            @else
                                                <i class="fa fa-check"></i>
                                                <span class="label label-primary">Semua Buku Telah dikembalikan</span>
                                            @endif
                                        </li>
                                    </ul>
                                @endif
                                <div class="panel-footer bg-white">
                                    <!-- <span class="pull-right badge badge-info">32</span> -->
                                    <a href="{{ url('Data Transaksi') }}" class="btn btn-sm btn-info">Data Peminjam <i class="glyphicon glyphicon-log-in"></i></a>
                                </div>
                            </div>
                        </div>
              </div>
              <!-- row end -->
                </section>        

@endsection