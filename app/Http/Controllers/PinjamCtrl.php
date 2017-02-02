<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Pagination\LengthAwarePaginator;

use File;
use Input;
use DB;
use Auth;
use Redirect;
use Response;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;
use App\DtlTrans;

class PinjamCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	public function pinjam(){
		if(Auth::guest()){
			$error = "daftar";
			return view('LoginUser', compact('error'));
		}
		elseif(Auth::user()->status=="non-active" && Auth::user()->type=="user") {
			$error = "status";
			return view('LoginUser', compact('error'));
		}
		else{
			
			$id=Request::input('id');
		 	$buku=Buku::whereIn('id', $id)
				->get()->toArray();
		 	return view('page.page-pinjam', compact('buku'));
		}
	}
	public function peminjaman() {
		$id = Request::input('id');
		for ($i=0; $i < count($id); $i++) { 
			$buku = Buku::find($id[$i]);

			$temp = $buku->jumlah_buku;
			$total = $temp-1;
			$buku->jum_temp = $total;
			$buku->save();
		}

		$pinjam = new Transaksi;
		$pinjam->nama_peminjam = Request::input('nama');
		$pinjam->tgl_pinjam = date("Y-m-d");
		$pinjam->batas = date("Y-m-d", strtotime("+5 day"));
		$pinjam->tgl_kembali = "0000-00-00";
		$pinjam->status = "belum kembali";
		$pinjam->save();

		for ($i=0; $i < count($id); $i++) { 
			$detail = new DtlTrans;
			$detail->id_mst = $pinjam->id;
			$detail->id_buku = Request::input('id')[$i];
			$detail->nama_buku = Request::input('judul')[$i];
			$detail->save();
		}

		return Redirect::to('User/index');
	}

	public function DaftarPinjam($username=null)	{
		$mode = "all";
		$daftar = Transaksi::where('nama_peminjam', '=', $username)
			->paginate(5);

		$daftar->setPath('pinjam');

		return view('page.page-DaftarPeminjam', compact('daftar', 'mode'));
	}

	public function dafpin()	{
		$mode = "satu";
		return view('page.page-DaftarPeminjam', compact('mode'));
	}

	public function pengembalian($id=null)	{
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
					$total[$i] = $den[$i];
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

		return view('page.page-pengembalian', compact('master', 'detail', 'total', 'den'));
	}

	public function kembali($id=null)	{
		$master = Transaksi::find($id);
		$id_mst = $master->id;

		$detail = DtlTrans::where('id_mst', '=', $id_mst)->get();

		for ($i=0; $i < count($detail); $i++) {
			$detail1 = DtlTrans::find($detail[$i]->id);

			$detail1->total = Request::input('total')[$i];
			$detail1->save();
		}

		$master->status = "waiting approve";
		$master->save();

		return Redirect::to('User/index');
	}
}