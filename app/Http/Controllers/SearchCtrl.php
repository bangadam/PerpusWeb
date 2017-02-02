<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use File;
use Input;
use DB;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class SearchCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	public function getName(Request $request){
		$mode = "cari";
		$cari=$request->input('cari');
		$anggota=Anggota::all();
		$hasil=Anggota::Where('username', 'LIKE', '%'.$cari.'%')
		->paginate(3);

		$hasil->setPath('Data Buku');

		return view('admin/anggota', compact('hasil', 'mode', 'anggota'));
	}
	public function getNama(Request $request){
		$mode = "cari";
		$cari=$request->input('cari');
		$buku=Buku::all();
		$hasil=Buku::Where('judul', 'LIKE', '%'.$cari.'%')
		->paginate(5);

		$hasil->setPath('Data Buku');

		return view('admin/buku', compact('hasil', 'mode', 'buku'));
	}
	public function getPeminjam(Request $request)	{
		$mode = "cari";
		$cari = $request->input('cari');
		$hasil = Transaksi::Where('nama_peminjam', 'LIKE', '%'.$cari.'%')
		->get()->toArray();

		return view('admin\transaksi', compact('mode', 'hasil'));
	}
	public function getPinjam(Request $request)	{
		$mode = "cari";
		$cari = $request->input('cari');
		$hasil = Transaksi::Where('nama_peminjam', 'LIKE', '%'.$cari.'%')
		->get()->toArray();

		// print_r($hasil);
		return view('page.page-DaftarPeminjam', compact('mode', 'hasil')); 
	}
}