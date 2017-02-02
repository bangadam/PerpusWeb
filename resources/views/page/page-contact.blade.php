@extends('layout.UserLayout')

@section('content')
<style type="text/css">
	.contact {
		list-style-type: none;
	}
</style>
	<div class="panel-body">
		<div class="table-responsive">
			Untuk info lebih lanjut, silahkan menghubungi contact Admin kami :<br><br>
			<ul class="contact">
				<li><img src="{{ asset('img/credit/Instagram.ico') }}" /> : @iwan_sam</li><br>
				<li><img src="{{ asset('img/credit/facebook.ico') }}"/> : </li><br>
				<li><img src="{{ asset('img/credit/gmail.ico') }}"/> : didiklovevika997@yahoo.com</li><br>
				<li><img src="{{ asset('img/credit/bbm.ico') }}"/> : 54056E0B</li>
			</ul>
		</div>
	</div>
@endsection