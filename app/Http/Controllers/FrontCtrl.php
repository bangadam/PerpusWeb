<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

use File;
use Input;
use DB;
use Auth;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class FrontCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	public function user()	{
		$error = "no";
		return view('LoginUser', compact('error'));
	}
	public function index() {
		$tgl=date('Y-m-d');
		$pengunjung=Pengunjung::Where('tgl_kunjung', '=', $tgl)
		->get()->toArray();

		$kunjung=Pengunjung::orderBy('id', 'desc')
		->get()->toArray();
		
		$result=count($pengunjung);
		$jum_kunjung=count($kunjung);
		return view('index', compact('pengunjung', 'kunjung', 'result', 'jum_kunjung'));
	}

	public function bk_kunjung(Request $request) {
		$kunjung = new Pengunjung;

		$kunjung->nama = $request->input('nama');
		$kunjung->jk = $request->input('jk');
		$kunjung->tgl_kunjung = $request->input('tgl_kunjung');
		$kunjung->jam_kunjung = $request->input('jam_kunjung');

		$kunjung->save();

		return redirect('/Login/user');
		// return redirect('/auth/login');
	}
	public function masuk(){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}

		$anggota=Anggota::all()->toArray();
		$book=Buku::all()->toArray();
		$buku=Buku::Where('id', '<', '3')->get()->toArray();
		$transaksi=Transaksi::Where('status', '=', 'waiting approve')->get()->toArray();
		$trans=Transaksi::Where('status', '=', 'belum kembali')->get()->toArray();
		$tgl=date('Y-m-d');
		$peminjam=Transaksi::Where('tgl_pinjam', '=', $tgl)
		->get()->toArray();

		$result=count($peminjam);

		
		return view('admin/index', compact('anggota', 'buku', 'transaksi', 'peminjam','result', 'book', 'trans'));
	}
	public function about()	{
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		
		return view('admin.tentang');
	}
	
}