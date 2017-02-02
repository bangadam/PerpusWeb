@extends('layout.FrontAdmin')

@section('content')

<aside class="right-side">

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <header class="panel-heading">
                        <b>Detail Admin</b>
                    </header>
                    
            
                    <div class="panel-body">
                        <table id="example" class="table table-hover">
                            <tr>
                                <td rowspan="9">
                                    <div class="pull-left image">
                                        <img src="{{ asset(Auth::user()->gambar)}}" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                                    </div>
                                </td>
                                <td>User ID</td>
                                <td>{{{ Auth::user()->id }}}</td>
                            </tr>
                            <tr>
                                <td width="250">Username</td>
                                <td width="550">{{{ Auth::user()->username }}}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>{{{ Auth::user()->password }}}</td>
                            </tr>
                            <tr>
                                <td>Fullname</td>
                                <td>{{{ Auth::user()->username }}}</td>
                            </tr>
                        </table>
         
                        <div class="text-right">
                            <a href="{{ url('2016/dashboard') }}" class="btn btn-sm btn-danger"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection