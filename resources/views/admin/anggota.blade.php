@extends ('layout.FrontAdmin')

@section ('content')

<script type="text/javascript">
	function report(form) {
		if(form.status.value == "non-active"){
			var pesan = confirm("Apakah yakin ingin mengubah status\n menjadi Active ??");

			if (pesan == true) {
				return (true);
			} else {
				return (false);
			}
		}
		else if(form.status.value == "active"){
			var pesan = confirm("Apakah yakin ingin mengubah status\n menjadi Non-Active ??");

			if (pesan == true) {
				return (true);
			} else {
				return (false);
			}
		}
	}
</script>

<aside class="right-side">

                <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <header class="panel-heading">
                        <b>List Anggota</b>

                    </header>
                    <div class="panel-body table-responsive">
                      	<div class="box-tools m-b-15">
                        <form action="{{ url('cari') }}" method="GET">
                            <div class="input-group">
                            <input type='text' class="form-control input-sm pull-right" style="width: 150px;"  name='cari' placeholder='Cari berdasarkan Nama' required /> 
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>    
                      	</div>
		                <table id="example" class="table table-hover table-responsive table-striped">
		                  	<thead>
		                      <tr>
		                        <th>No Induk </th>
		                        <th>Nama </th>
		                        <th>Kelas </th>
		                        <th>Alamat </th>
		                        <th>Status </th>
		                        <th><center>Tools</center></th>
		                      </tr>
		                  	</thead>
		                   @if($mode=="all")
			                 <tbody>
			                    @foreach($anggota as $c)
				                    <tr>
				                    <td>{{ $c->no_induk }}</td>
				                    <td><a href="{{ url('View anggota', array($c->id)) }}"><span class="fa fa-user"></span> {{ $c->username }}</a></td>
				                    <td>{{ $c->kelas }} {{$c->jurusan}}-{{$c->category}}</td>
				                    <td>{{ $c->alamat }}</td>
				                    <td>
				                    	<form onsubmit="return report(this)" action="{{ url('edit', array($c->id)) }}" method="post">
				                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				                    	<input type="hidden" name="status" id="status" value="{{ $c->status }}" /><p class="text-uppercase">{{ $c->status }} </p>
						            </td>
				                    <td>
				                    @if($c->status=="active")
					                    <div id="thanks"><button data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan" class="btn btn-sm btn-primary tooltips" onclick="" type="submit" name="submit">
					                    <span class="glyphicon glyphicon-ban-circle"></span> 
					                    </button></form>
					                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="btn btn-sm btn-warning tooltips" href="{{ url('update anggota', array($c->id)) }}"><span class="glyphicon glyphicon-pencil"></a></td></tr></div>
				                    @else
					                    <div id="thanks"><button data-toggle="tooltip" data-placement="bottom" title="Aktifkan" class="btn btn-sm btn-primary tooltips" onclick="" type="submit" name="submit">
					                    <span class="glyphicon glyphicon-ok-circle"></span>
					                    </button></form>
					                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="btn btn-sm btn-warning tooltips" href="{{ url('update anggota', array($c->id)) }}"><span class="glyphicon glyphicon-pencil"></a>
					                    <a data-toggle="tooltip" data-placement="bottom" onclick="return confirm ('Yakin hapus {{ $c->username }}.?');" title="Hapus Data" class="btn btn-sm btn-danger tooltips" href="{{ url('delete', array($c->id)) }}"><span class="glyphicon glyphicon-trash"></a></td></tr></div>
				                    @endif
			                 	@endforeach
			                 </tbody>
			            </table>
			            <div class="pagination">@include('pagination.default', ['paginator' => $anggota])</div>
				        @elseif($mode=="cari")
				        	@if(count($hasil) > 0)
				        		<tbody>
				                    @foreach($hasil as $c)
					                    <tr>
					                    <td>{{ $c->no_induk }}</td>
					                    <td><a href="{{ url('View anggota', array($c->id)) }}"><span class="fa fa-user"></span> {{ $c->username }}</a></td>
					                    <td>{{ $c->kelas }}</td>
					                    <td>{{ $c->alamat }}</td>
					                    <td>
					                    	<form onsubmit="return report(this)" action="{{ url('edit', array($c->id)) }}" method="post">
					                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					                    	<input type="hidden" name="status" id="status" value="{{ $c->status }}" /><p class="text-uppercase">{{ $c->status }} </p>
							            </td>
					                    <td>
						                    <center><div id="thanks"><button class="btn btn-sm btn-primary" onclick="" type="submit" name="submit"><span class="glyphicon glyphicon-edit"></span> </button></form>
						                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="btn btn-sm btn-warning tooltips" href="{{ url('update anggota', array($c->id)) }}"><span class="glyphicon glyphicon-pencil"></a>
						                    <a data-toggle="tooltip" data-placement="bottom" onclick="return confirm ('Yakin hapus {{ $c->username }}.?');" title="Hapus Data" class="btn btn-sm btn-danger tooltips" href="{{ url('delete', array($c->id)) }}"><span class="glyphicon glyphicon-trash"></a></div></center>
					                    </td>
					                </tr>
				                 	@endforeach
				                </tbody>
				                </table>
				                <div class="pagination">@include('pagination.default', ['paginator' => $hasil])</div>
				            @else
				            	<tbody>
				            		<tr>
				            			<td colspan="7">Hasil Pencarian Kosong</td>
				            		</tr>
				            	</tbody>
				            	</table>
				           	@endif
				        @endif

                </div>
            </div>
        </div>
    </div>
<!-- row end -->
</section><!-- /.content -->


@endsection