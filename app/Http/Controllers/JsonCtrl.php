<?php namespace App\Http\Controllers;  
  
use Auth; 
use Input;
use File; 
// use Request;  
use App\User;
use App\Anggota;
use App\Kelas;
use App\Buku;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
  
class JsonCtrl extends Controller {
	
	public function postKelas(Request $request)	{
		$id = $request->input('kelas');
		if($id==""){
			$nama = "<option value='' disabled selected> -Nama-</option> <option value'' disabled selected> -kosong-</option>";
		} else {
			$user = User::Where('id_kelas', '=', $id)
				->get();
			$nama = "<option value='' disabled selected> -Nama-</option>";
			if (count($user) > 0) {
				
				foreach($user as $u) {
					$nama .= "<option value=".$u->username."> ".$u->username."</option>";
				}
			} else {
				$nama = "<option value='' disabled selected> -Nama-</option>";
				
			}
		}
		echo json_encode($nama);
	}
	public function postKode(Request $request)	{
		$id = $request->input('kode');
		
		if($id==""){
			$data = array(
				"judul" => "",
				"pengarang" => "",
				"terbit" => ""
			);
		} else {
		// for ($i=0; $i < count($id); $i++) { 
			$buku = Buku::find($id);
		/*	echo "<pre>";
			print_r($buku);
			echo "</pre>";die;*/

			$data = array(
				"judul" => $buku->judul,
				"pengarang" => $buku->pengarang,
				"terbit" => $buku->th_terbit
			);
		// }
		}
		echo json_encode($data);
	}
	public function postBulan(Request $request)	{
		$bln = $request->input('bulan');

		$tahun = "<option value=''> -tahun-</option>";
		for ($i=date("Y"); $i >= 1000; $i--) { 
			$tahun .="<option value=".$i."> ".$i."</option>";
		}

		echo json_encode($tahun);
	}
	public function postTahun(Request $request) {
		$bln = $request->input('bulan');
		$thn = $request->input('tahun');

		$tanggal = "<option value=''> -tanggal-</option>";
		switch ($bln) {
			case 'januari':
			case 'maret':
			case 'mei':
			case 'juli':
			case 'agustus':
			case 'oktober':
			case 'desember':{
				for ($i=1; $i <= 31; $i++) { 
					$tanggal .="<option value=".$i."> ".$i."</option>";
				}
				break;
			}
			case 'april':
			case 'juni':
			case 'september':
			case 'november':{
				for ($i=1; $i <= 30; $i++) { 
					$tanggal .="<option value=".$i."> ".$i."</option>";
				}
				break;
			}
			default :{
				if ($thn%4==0) {
					for ($i=1; $i <= 29; $i++) { 
						$tanggal .="<option value=".$i."> ".$i."</option>";
					}	
					break;
				} else if ($thn/4!=0) {
					for ($i=1; $i <= 28; $i++) { 
						$tanggal .="<option value=".$i."> ".$i."</option>";
					}
					break;
				}
			}
		}

		echo json_encode($tanggal);
	}
	
	/*public function postFile(Request $request) {
		$name = $request->file('sampul');
		$nameFile = $request->input('nama');

		$tujuan = "public/photos/sementara/";
		$sendfile = $nameFile.'.'.$request->file('sampul')->getClientOriginalExtension();

		$request->file('sampul')->move(base_path().'/'.$tujuan, $namaImage);

		$file = "{{ asset('photos/sementara/".$sendfile."') }}";

		echo json_encode($file);
	}*/
}