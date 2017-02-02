<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\User;
use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	public function home()
	{
		return view('home');
	}


	public function index() {
		$tgl=date('Y-m-d');
		$peminjam=Transaksi::Where('tgl_pinjam', '=', $tgl)
		->get()->toArray();

		$pinjam=Transaksi::orderBy('id', 'asc')->paginate(10)
		/*->get()->toArray()*/;

		$result=count($peminjam);
		$jum_pinjam=count($pinjam);
		$pinjam->setPath('');
		return view('index', compact('peminjam', 'pinjam', 'result', 'jum_pinjam'));
	}

}
