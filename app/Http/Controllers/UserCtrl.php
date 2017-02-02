<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use File;
use Input;
use DB;
use Auth;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class UserCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function home()	{
		if(Auth::user()){
			$trans = Transaksi::Where('nama_peminjam', '=', Auth::user()->username, 'and', 'tgl_kembali', '=', '0000-00-00')->get()->toArray();
		} else { 
			$trans=0;
		}
		$dbuk = Buku::orderBy('id', 'asc')
			->paginate(8);

		$dbuk->setPath('index');

		return view('page.page-buku', compact('dbuk', 'trans'));
	}
	public function contact()	{
		return view('page.page-contact');
	}
	public function edit($id=null)	{
		$anggota = Anggota::find($id);

		return view('page.page-DaftarMember', compact( 'anggota'));
	}
	public function Daftar(Request $request) {

			$nama = $request->input('username');	
			$image = $request->file('foto');
			if(!empty($image)){
				$tujuan = "public/img/user/";
				$namaImage = $nama.'.'.
				$request->file('foto')->getClientOriginalExtension();

				$request->file('foto')->move(base_path().'/'.$tujuan, $namaImage);

			}

			$anggota = new Anggota;

			$anggota->no_induk = $request->input('id');
			$anggota->username = $nama;
			$anggota->password = bcrypt($request->input('password'));
			$anggota->jk = $request->input('jk');
			$anggota->ttl = $request->input('ttl');
			$anggota->alamat = $request->input('alamat');
			$anggota->gambar = "img/user/".$namaImage;
			$anggota->type = "user";
			$anggota->pass_remember = $request->input('pass_confirm');

			$anggota->save();

		return redirect('auth/login');
	}
	public function Update(Request $request, $id=null) {

			$anggota = Anggota::find($id);
			$nama = $request->input('username');	
			$image = $request->file('foto');
			if(!empty($image)){
				$tujuan = "public/img/user/";
				$namaImage = $nama.'.'.
				$request->file('foto')->getClientOriginalExtension();

				$request->file('foto')->move(base_path().'/'.$tujuan, $namaImage);

			}

			$anggota->username = $nama;
			$anggota->ttl = $request->input('ttl');
			$anggota->alamat = $request->input('alamat');
			$anggota->gambar = "img/user/".$namaImage;
			$anggota->password = bcrypt($request->input('password'));
			$anggota->pass_remember = $request->input('pass_confirm');

			$anggota->save();

		return redirect('auth/login');
	}
}