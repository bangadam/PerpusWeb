<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use vendor\phpoffice\phpexcel\Classes\PHPExcel;

use File;
use Input;
use DB;
use PDF;
use View;
use Excel;
use Redirect;
use App;
use Auth;
use Hash;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;
use App\DtlTrans;
use App\User;
use App\Kelas;

class TransCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	public function index()	{
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$mode = "all";
		$transaksi = Transaksi::orderBy('id', 'asc')
		->paginate(6);

		$transaksi->setPath('Data Transaksi');

		return view('admin\transaksi', compact('transaksi', 'mode'));
	}
	public function jum_buku() {
		return view('admin\jum_buku');
	}
	public function transaksi(Request $request) {
		$jum = $request->input('buku');
		$kelas = Kelas::orderBy('id_kelas', 'asc')->get()->toArray();
		$buku = Buku::orderBy('id', 'asc')->get()->toArray();

		return view('admin\TransPinjam', compact('jum', 'kelas', 'buku'));
	}
	public function TransaksiPinjam(Request $request) {

		$id = $request->input('id');
		for ($i=0; $i < count($id); $i++) { 
			$buku = Buku::find($id[$i]);

			$temp = $buku->jumlah_buku;
			$total = $temp-1;
			$buku->jum_temp = $total;
			$buku->save();
		}

		$pinjam = new Transaksi;
		$pinjam->nama_peminjam = $request->input('nama');
		$pinjam->tgl_pinjam = date("Y-m-d");
		$pinjam->batas = date("Y-m-d", strtotime("+7 day"));
		$pinjam->tgl_kembali = "0000-00-00";
		$pinjam->status = "belum kembali";
		$pinjam->save();

		for ($i=0; $i < count($id); $i++) { 
			$detail = new DtlTrans;
			$detail->id_mst = $pinjam->id;
			$detail->id_buku = $request->input('id')[$i];
			$detail->nama_buku = $request->input('judul')[$i];
			$detail->save();
		}
		/*$nama = Request::input('nama');
		if ($Anggota(['nama' => $username])) {*/
		return Redirect::to('Data Transaksi');/*
		}
		else{
			return redirect()->back();
		}*/
	}
	public function Detail($id=null) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$master = Transaksi::find($id);

		$detail = DtlTrans::select('trans_pinjam.id', 'trans_pinjam.nama_peminjam','trans_pinjam.tgl_pinjam', 'trans_pinjam.batas', 'trans_pinjam.tgl_kembali', 'trans_pinjam.status', 'dtl_trans.id_buku', 'dtl_trans.nama_buku', 'data_buku.judul', 'data_buku.penerbit', 'data_buku.pengarang', 'data_buku.kategori', 'dtl_trans.total', 'data_buku.denda')
				->join('data_buku', 'dtl_trans.id_buku', '=', 'data_buku.id')
				->join('trans_pinjam', 'dtl_trans.id_mst', '=', 'trans_pinjam.id')
				->where('dtl_trans.id_mst', '=', $id)
				->get()->toArray();

		

		if ($detail[0]['status']=="belum kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", time());
				$batas = date("d", strtotime($detail[0]['batas']));

				$jum = $day-$batas;
				if ($jum > 0) {
					$den[$i] = $denda * $jum;
					$total[$i] =$den[$i];
				} else {
					$den[$i] = 0;
					$total[$i] = 0;
				}

				$jumlah = $jumlah + $total[$i];
			}
		}
		else if($detail[0]['status']=="sudah kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", strtotime($detail[0]['tgl_kembali']));
				$batas = date("d", strtotime($detail[0]['batas']));

				$juml = $day-$batas;
				if ($juml > 0) {
					$den[$i] = $denda * $juml;
					$total[$i] = $detail[$i]['total'];
				} else {
					$den[$i] = 0;
					$total[$i] = $detail[$i]['total'];
				}

				$jumlah = $jumlah + $total[$i];
			}
		}
		else if($detail[0]['status']=="waiting approve") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", strtotime($detail[0]['tgl_kembali']));
				$batas = date("d", strtotime($detail[0]['batas']));

				$juml = $day-$batas;
				if ($juml > 0) {
					$den[$i] = $denda * $juml;
					$total[$i] = $detail[$i]['total'];
				} else {
					$den[$i] = 0;
					$total[$i] = $detail[$i]['total'];
				}

				$jumlah = $jumlah + $total[$i];
			}
		}
		
		return view('admin\DetailTrans', compact('master', 'detail', 'total', 'den'));
	}
	public function Pengembalian($id=null) {
		$master = Transaksi::find($id);
		$id_mst = $master->id;

		$detail = DtlTrans::where('id_mst', '=', $id_mst)->get();

		for ($i=0; $i < count($detail); $i++) {
			
			$buku = Buku::find($detail[$i]->id_buku);
			
			$temp = $buku->jum_temp;
			$buku->jum_temp = $temp+1;
			$buku->save();
		}

		$master->tgl_kembali = date("Y-m-d");
		$master->status = "sudah kembali";

		$master->save();




		/*$id_master = $master['id'];

		$pdf = App::make('dompdf.wrapper');


		$detail = DtlTrans::select('trans_pinjam.id', 'trans_pinjam.nama_peminjam','trans_pinjam.tgl_pinjam', 'trans_pinjam.batas', 'trans_pinjam.tgl_kembali', 'trans_pinjam.status', 'dtl_trans.id_buku', 'dtl_trans.nama_buku', 'data_buku.judul', 'data_buku.penerbit', 'data_buku.pengarang', 'data_buku.kategori', 'dtl_trans.total', 'data_buku.denda')
				->join('data_buku', 'dtl_trans.id_buku', '=', 'data_buku.id')
				->join('trans_pinjam', 'dtl_trans.id_mst', '=', 'trans_pinjam.id')
				->where('dtl_trans.id_mst', '=', $id_master)
				->get()->toArray();

		if($detail[0]['status']=="sudah kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", strtotime($detail[0]['tgl_kembali']));
				$batas = date("d", strtotime($detail[0]['batas']));

				$juml = $day-$batas;
				if ($juml > 0) {
					$den[$i] = $denda * $juml;
					$total[$i] = $detail[$i]['total'];
				} else {
					$den[$i] = 0;
					$total[$i] = $detail[$i]['total'];
				}

				$jumlah = $jumlah + $den[$i];
			}
		}


		$pdf->loadView('pdf.print-PDF', compact('id', 'detail', 'total', 'jumlah', 'den'));
		$pdf->setPaper('A4')->setOrientation('potrait');

        $savename="Nota Pembayaran.pdf";

        return $pdf->stream($savename);*/
        return redirect('2016/dashboard');
	}
	public function printPDF($id=null)	{
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$pdf = App::make('dompdf.wrapper');


		$detail = DtlTrans::select('trans_pinjam.id', 'trans_pinjam.nama_peminjam','trans_pinjam.tgl_pinjam', 'trans_pinjam.batas', 'trans_pinjam.tgl_kembali', 'trans_pinjam.status', 'dtl_trans.id_buku', 'dtl_trans.nama_buku', 'data_buku.judul', 'data_buku.penerbit', 'data_buku.pengarang', 'data_buku.kategori', 'dtl_trans.total', 'data_buku.denda')
				->join('data_buku', 'dtl_trans.id_buku', '=', 'data_buku.id')
				->join('trans_pinjam', 'dtl_trans.id_mst', '=', 'trans_pinjam.id')
				->where('dtl_trans.id_mst', '=', $id)
				->get()->toArray();

		

		if ($detail[0]['status']=="belum kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", time());
				$batas = date("d", strtotime($detail[0]['batas']));

				$jum = $day-$batas;
				if ($jum > 0) {
					$den[$i] = $denda * $jum;
					$total[$i] =$den[$i];
				} else {
					$den[$i] = 0;
					$total[$i] = 0;
				}

				$jumlah = $jumlah + $total[$i];
			}
		}
		else if($detail[0]['status']=="sudah kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", strtotime($detail[0]['tgl_kembali']));
				$batas = date("d", strtotime($detail[0]['batas']));

				$juml = $day-$batas;
				if ($juml > 0) {
					$den[$i] = $denda * $juml;
					$total[$i] = $detail[$i]['total'];
				} else {
					$den[$i] = 0;
					$total[$i] = $detail[$i]['total'];
				}

				$jumlah = $jumlah + $den[$i];
			}
		}

		$pdf->loadView('pdf.print-PDF', compact('id', 'detail', 'total', 'jumlah', 'den'));
		$pdf->setPaper('A4')->setOrientation('potrait');

        $savename="Nota Pembayaran.pdf";

        return $pdf->stream($savename);

	}

	public function ExportToExcel($id=null) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
        Excel::create('Detail Transaksi dgn ID '.$id, function($excel) use ($id){
        	
        	
			$excel->sheet('sheet', function($sheet) use ($id){
				/*$id = Request::input('id');
				$peminjam = Request::input('peminjam');
				$tgl_pinjam = Request::input('tgl-pinjam');
				$batas = Request::input('batas');
				$status = Request::input('status');*/
				

				$detail = DtlTrans::select('trans_pinjam.id', 'trans_pinjam.nama_peminjam','trans_pinjam.tgl_pinjam', 'trans_pinjam.batas', 'trans_pinjam.status', 'dtl_trans.id_buku', 'trans_pinjam.tgl_kembali', 'dtl_trans.nama_buku', 'data_buku.judul', 'data_buku.penerbit', 'data_buku.pengarang', 'data_buku.kategori', 'dtl_trans.total', 'data_buku.denda')
				->join('data_buku', 'dtl_trans.id_buku', '=', 'data_buku.id')
				->join('trans_pinjam', 'dtl_trans.id_mst', '=', 'trans_pinjam.id')
				->where('dtl_trans.id_mst', '=', $id)
				->get()->toArray();

		

		if ($detail[0]['status']=="belum kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", time());
				$batas = date("d", strtotime($detail[0]['batas']));

				$jum = $day-$batas;
				if ($jum > 0) {
					$den[$i] = $denda * $jum;
					$total[$i] = $den[$i];
				} else {
					$den[$i] = 0;
					$total[$i] = 0;
				}

				$jumlah = $jumlah + $total[$i];
			}
		}
		else if($detail[0]['status']=="sudah kembali") {
			$jumlah = 0;
			$bat = count($detail);
			for ($i=0; $i < $bat; $i++) {
				$denda = $detail[$i]['denda'];
				$day = date("d", strtotime($detail[0]['tgl_kembali']));
				$batas = date("d", strtotime($detail[0]['batas']));

				$juml = $day-$batas;
				if ($juml > 0) {
					$den[$i] = $denda * $juml;
					$total[$i] = $detail[$i]['total'];
				} else {
					$den[$i] = 0;
					$total[$i] = $detail[$i]['total'];
				}

				$jumlah = $jumlah + $total[$i];
			}
		}

				$sheet->getStyle('A4')->applyFromArray(array(
			        'fill' => array(
			        	// 'style' => PHPExcel_Style_Borders::BORDER_DASHDOT,
			            'color' => array('rgb' => 'FF0000')
			        )
			    ));
			    $sheet->setFontFamily('Comic Sans MS');
			    $sheet->setStyle(array(
			        'font' => array(
			            'name'      =>  'Calibri',
			            'size'      =>  10,
			            'bold'      =>  false
			        )
			    ));

				$sheet->loadView('excel.print-Excel-Detail', compact('detail', 'id', 'Total', 'jumlah', 'den'));
			})->export('xls');
		});
    }
}