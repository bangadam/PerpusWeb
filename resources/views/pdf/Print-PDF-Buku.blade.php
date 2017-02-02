<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>List Book</title>
	</head>
	<body>
		<style type="text/css">
			.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
			.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
			.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
			.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
			.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
			.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
		</style>

		<?php
		date_default_timezone_set("Asia/Jakarta");
		?>

		<script>
		    $(document).ready(function() {
				$('#dp3').datepicker();	
				$('#dp4').datepicker();	
			});
		</script>

		<center><h2>Daftar Buku di <font size="+4">/P</font>usWeb<font size="-2">.com</font></h2></center>
		<center><h5>Admin : <b>{{{ Auth::user()->username }}}</b></h5></center><br>

		<div class="row">
			<div class="col-lg-10">
				<div class="">
					<div class="">
						<table class="tg">
							<thead>
								<tr>
									<th class="tg-3wr7">No</th>
									<th class="tg-3wr7">Judul</th>
									<th class="tg-3wr7">Pengarang</th>
									<th class="tg-3wr7">Penerbit</th>
									<th class="tg-3wr7">Tahun Terbit</th>
									<th class="tg-3wr7">Kategori</th>
									<th class="tg-3wr7">Lokasi Rak</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($buku as $a)
									<tr>
										<td>{{{$i++}}}</td>
										<td>{{{ $a['judul'] }}}</td>
										<td>{{{$a['pengarang']}}}</td>
										<td>{{{$a['penerbit']}}}</td>
										<td>{{{$a['th_terbit']}}}</td>
										<td>{{{$a['kategori']}}}</td>
										<td>{{{$a['lokasi']}}}</td>
									</tr>
								@endforeach
							</tbody>
						</table><br><br>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


