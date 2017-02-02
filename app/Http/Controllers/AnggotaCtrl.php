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
use App\Kelas;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class AnggotaCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }

	public function anggota(){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$mode = "all";
		$anggota=Anggota::where('type', '=', 'user')->paginate(6);

		$anggota->setPath('Data Anggota');

		return view('admin/anggota', compact('anggota', 'mode'));
	}
	public function TAnggota(){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$jenis = "input";
		$kelas = Kelas::orderBy('id_kelas', 'asc')->get()->toArray();
		return view('admin/TAnggota', compact('jenis', 'kelas'));
	}
	public function UAnggota($id=null){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$anggota = Anggota::find($id);
		$jenis = "update";
		$place = explode(",", $anggota->ttl);
		$tanggal = explode(" ", $place[1]);
		$jurusan = explode("-", $anggota->jurusan);

		// print_r($place);
		// print_r($tanggal);
		return view('admin/TAnggota', compact('anggota', 'jenis', 'place', 'tanggal', 'jurusan'));
	}
	public function VAnggota($id=null){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$anggota = Anggota::find($id);
		$jenis = "View";
		$place = explode(",", $anggota->ttl);
		$tanggal = explode(" ", $place[1]);
		$jurusan = explode("-", $anggota->jurusan);

		// print_r($place);
		// print_r($tanggal);
		return view('admin/TAnggota', compact('anggota', 'jenis', 'place', 'tanggal', 'jurusan'));
	}
	public function DAnggota($id=null){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$anggota = Anggota::find($id)
		->delete();
		return redirect()->back();
	}
	public function tambahA(Request $request, $id=null) {
			
			$nama = $request->input('nama');
			$image = $request->file('foto');
			$kelas = $request->input('kelas');
			if(!empty($image)){
				$tujuan = "public/img/user/";
				$namaImage = $nama.'.'.$request->file('foto')->getClientOriginalExtension();

				$request->file('foto')->move(base_path().'/'.$tujuan, $namaImage);

			}

			$anggota = new Anggota;

			$anggota->no_induk = $request->input('no_induk');
			$anggota->username = $request->input('nama');
			$anggota->password = bcrypt($request->input('pass'));
			$anggota->id_kelas =$kelas;
			$anggota->kelas = $request->input('kelas');
			$anggota->jurusan=$request->input('jurusan');
			$anggota->category=$request->input('no');
			$anggota->jk = $request->input('jk');
			$anggota->ttl = $request->input('place').', '.$request->input('tgl').' '.$request->input('bln').' '.$request->input('thn');
			$anggota->alamat = $request->input('alamat');
			$anggota->gambar = "img/user/".$namaImage;
			$anggota->type = "user";
			$anggota->status = "active";
			$anggota->pass_remember = $request->input('pass_confirm');

			$anggota->save();

		return redirect('Data Anggota');
	}
	public function updateA(Request $request, $id=null) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$status = $request->input('status');
		$anggota=Anggota::find($id);

		if($status == "active"){
			$anggota->status = "non-active";
		}
		else if($status == "non-active"){
			$anggota->status = "active";
		}

		$anggota->save();

		return redirect()->back();
	}
	public function tulis(Request $request, $id=null) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}

		$anggota=Anggota::find($id);

		$nama = $anggota->username;
		$image = $request->file('foto');
		$status = $request->input('status');
		if(!empty($image)){
			$tujuan = "public/img/user/";
			$namaImage = $nama.'.'.
			$request->file('foto')->getClientOriginalExtension();

			$request->file('foto')->move(base_path().'/'.$tujuan, $namaImage);

			$anggota->username = $request->input('nama');
			$anggota->password = $request->input('password');
			$anggota->pass_remember = $request->input('pass_confirm');
			$anggota->id_kelas = $request->input('kelas');
			$anggota->kelas = $request->input('kelas');
			$anggota->jurusan=$request->input('jurusan');
			$anggota->category=$request->input('no');
			$anggota->ttl = $request->input('place').', '.$request->input('tgl').' '.$request->input('bln').' '.$request->input('thn');
			$anggota->alamat = $request->input('alamat');
			$anggota->gambar = "img/user/".$namaImage;
			$anggota->status = $status;

			$anggota->save();
		} else {
			$anggota->username = $request->input('nama');
			$anggota->password = $request->input('password');
			$anggota->pass_remember = $request->input('pass_confirm');
			$anggota->kelas = $request->input('kelas');
			$anggota->jurusan = $request->input('jurusan');
			$anggota->category=$request->input('no');
			$anggota->ttl = $request->input('place').', '.$request->input('tgl').' '.$request->input('bln').' '.$request->input('thn');
			$anggota->alamat = $request->input('alamat');
			$anggota->status = $status;

			$anggota->save();
		}

		return redirect('Data Anggota');
	}

}