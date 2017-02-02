@extends('layout.UserLayout')

@section('content')
@if(count($trans)!=0)
	@if(count($trans) > 0 && $trans[0]['batas'] < date('Y-m-d'))
		<div class="alert alert-danger">
		    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong><i class=" glyphicon glyphicon-exclamation-sign"></i> Ma'af!</strong> Anda belum mengembalikan Buku yang Anda pinjam dan sudah melewati batas waktu yang sudah ditentukan.<br> Saat ini Anda tidak bisa lagi meminjam Buku sebelum Anda mengembalikan terlebih dahulu.<br><br>
		</div>
	@elseif(count($trans) > 0 && $trans[0]['batas'] >= date('Y-m-d'))
		<div class="alert alert-info">
		    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong><i class=" glyphicon glyphicon-info-sign"></i> Ma'af!</strong> Anda belum mengembalikan Buku yang Anda pinjam.<br> Saat ini Anda tidak bisa lagi meminjam Buku sebelum Anda mengembalikan terlebih dahulu.<br><br>
		</div>
	@elseif(count($trans) > 0 && $trans[0]['status']=="waiting approve")
		<div class="alert alert-info">
		    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong><i class=" glyphicon glyphicon-info-sign"></i> Info!</strong> Silahkan memberitahukan Petugas kalau Buku yang telah Anda pinjam sudah dikembalikan. Agar Anda bisa kembali meminjam Buku yang lainnya.<br> Tetapi saat ini Anda masih belum bisa meminjam Buku sebelum Anda mengonfirmasikan terlebih dahulu kepada Petugas.<br><br>
		</div>
	@endif
@endif


    <form method="POST" action="{!! url('User/pinjam') !!}" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<div class="grid-wrap">
         		<div class="grid">
		          	<tbody>
		        	@foreach($dbuk as $b)
			        	<figure>
			        		<img src="{{ asset($b['gambar']) }}" class=" img-rounded" width="304" height="206" alt="img{{ $b['id'] }}" />
			        		<p align="center">
			        		@if(Auth::user())
			        			<input type="checkbox" name="id[]" value="{{ $b['id'] }}" />
			        		@else
			        			<!-- <input type="checkbox" class="disabled" name="id[]" value="{{ $b['id'] }}" /> -->
			        		@endif
			        		</p>
			        	</figure>
		            @endforeach
		          	</tbody>
		          	
          		</div>
        	</div>
        
    	</div>
	    <div class="container">
	    	<div class="pagination">@include('pagination.default', ['paginator' => $dbuk])</div>
	    </div>
	    @if($trans!=0)
		    @if($trans[0]['status']=="belum kembali" && $trans[0]['batas'] < date('Y-m-d'))
		    <div class="pinjam">
		    	<button type="submit" class="btn btn-primary disabled">pinjam</button>
		    </div>
		    @elseif($trans[0]['status']=="belum kembali" && $trans[0]['batas'] >= date('Y-m-d'))
		    <div class="pinjam">
		    	<button type="submit" class="btn btn-primary disabled">pinjam</button>
		    </div>
		    @elseif($trans[0]['status']=="waiting approve")
		    <div class="pinjam">
		    	<button type="submit" class="btn btn-primary disabled">pinjam</button>
		    </div>
		    @else
		    <div class="pinjam">
		    	<button type="submit" class="btn btn-primary">pinjam</button>
		    </div>
		    @endif
		@endif
	</form>

@endsection