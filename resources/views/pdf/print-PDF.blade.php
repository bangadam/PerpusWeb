<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Detail Transaksi</title>
	</head>
	<body>
		<style type="text/css">
			.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
			.tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
			.tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
			.tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
			.tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
			.tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
			.ttd{font-size: 20px;font-family: "Vladimir Script";}
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

		<center><h2>Nota Pembayaran</h2></center>
		<center><h4>Tanggal : {{{ date("d F Y") }}}</h4></center>
		<center><h5>Admin : <b>{{{ Auth::user()->username }}}</b></h5></center><br>

		<div class="row">
			<div class="col-lg-10">
				<div class="">
					<div class="">
						<table>
							<tr>
								<td><b>ID Transaksi&nbsp;&nbsp;</b></td>
								<td><b> : &nbsp;&nbsp;</b></td>
								<td>{{{ $id }}}</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>Tanggal Pinjam&nbsp;&nbsp;</b></td>
								<td><b> : &nbsp;&nbsp;</b></td>
								<td>{{{ $detail[0]['tgl_pinjam'] }}}</td>
							</tr>
							<tr>
								<td><b>Peminjam&nbsp;&nbsp;</b></td>
								<td><b> : &nbsp;&nbsp;</b></td>
								<td>{{{ $detail[0]['nama_peminjam'] }}}</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>Batas Pinjam&nbsp;&nbsp;</b></td>
								<td><b> : &nbsp;&nbsp;</b></td>
								<td>{{{ $detail[0]['batas'] }}}</td>
							</tr>
							<tr>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>Status&nbsp;&nbsp;</b></td>
								<td><b> : &nbsp;&nbsp;</b></td>
								<td>{{{ $detail[0]['status'] }}}</td>
							</tr>
						</table><br><br><br>
						<center><h5><b>Daftar Buku yang Dipinjam</b></h5></center><br>
						<table class="tg">
							<thead>
								<tr>
									<th class="tg-3wr7">No</th>
									<th class="tg-3wr7">Judul</th>
									<th class="tg-3wr7">Pengarang</th>
									<th class="tg-3wr7">Penerbit</th>
									<th class="tg-3wr7">denda</th>
								</tr>
							</thead>
							<tbody>
								@if($detail[0]['status']=="sudah kembali")
								@for($i=0; $i<count($detail);$i++)
									<tr>
										<td>{{{$i+1}}}</td>
										<td>{{{ $detail[$i]['judul'] }}}</td>
										<td>{{{ $detail[$i]['pengarang'] }}}</td>
										<td>{{{ $detail[$i]['penerbit'] }}}</td>
										<td>{{{ $den[$i] }}}</td>
									</tr>
								@endfor
									<tr>
										<td colspan="4">Total</td>
										<td>{{ $jumlah }}</td>
									</tr>
								@else
								@for($i=0; $i<count($detail);$i++)
									<tr>
										<td>{{{$i+1}}}</td>
										<td>{{{ $detail[$i]['judul'] }}}</td>
										<td>{{{ $detail[$i]['pengarang'] }}}</td>
										<td>{{{ $detail[$i]['penerbit'] }}}</td>
										<td>{{{ $den[$i] }}}</td>
									</tr>
								@endfor
									<tr>
										<td colspan="4">Total</td>
										<td>{{ $jumlah }}</td>
									</tr>
								@endif
							</tbody>
						</table><br><br><br>
						<table>
							<tr>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								@if($detail[0]['status']=="sudah kembali")
								<td>Surabaya, {{{ date("d F Y", strtotime($detail[0]['tgl_kembali'])) }}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								@else
								<td>Surabaya, {{{ date("d F Y") }}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								@endif
							</tr>
							<tr>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>Yang Mengetahui, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><img src="{{ asset('img/TTD2.png') }}" width="175" height="55" title="TTD"></td>
							</tr>
							<tr>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><b>&nbsp;&nbsp;</b></td>
								<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
								<td>&nbsp;&nbsp;</td>
								<td><u><i>{{{ Auth::user()->username }}}</i></u></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


