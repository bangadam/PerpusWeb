<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use File;
use Input;
use DB;
use PDF;
use View;
use Excel;
use App;
use Auth;

use App\Buku;
use App\Anggota;
use App\Pengunjung;
use App\Transaksi;

class BukuCtrl extends ParentCtrl
{
    public function __construct()
    {
        parent::__construct();
    }
	public function buku()	{
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$mode = "all";
		$buku = Buku::orderBy('judul', 'asc')
		->paginate(5);

		$buku->setPath('Data Buku');

		return view('admin/buku', compact('buku', 'mode'));
	}
	public function Tbuku(){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$jenis="input";
		return view('admin/TambahBuku', compact('jenis'));
	}
	public function UBuku($id=null){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$jenis="update";
		$bk=Buku::find($id);

		return view('admin/TambahBuku', compact('jenis', 'bk'));
	}
	public function VBuku($id=null){
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$jenis="View";
		$bk=Buku::find($id);

		return view('admin/TambahBuku', compact('jenis', 'bk'));
	}
	public function tambahB(Request $request) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$kat = $request->input('kategori');
		$tahun = $request->input('th_terbit');
		$judul = $request->input('judul');
		if ($kat == "Sejarah") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak A".rand(1, 8);
			}
			else {
				$rak = "Rak B".rand(1, 8);
			}
		}
		elseif ($kat == "Sekolah") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak C".rand(1, 8);
			}
			else {
				$rak = "Rak D".rand(1, 8);
			}
		}
		elseif ($kat == "Pengetahuan") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak E".rand(1, 8);
			}
			else {
				$rak = "Rak F".rand(1, 8);
			}
		}
		elseif ($kat == "Sains") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak G".rand(1, 8);
			}
			else {
				$rak = "Rak H".rand(1, 8);
			}
		}
		elseif ($kat == "Teknologi") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak I".rand(1, 8);
			}
			else {
				$rak = "Rak J".rand(1, 8);
			}
		}
		elseif ($kat == "Cerita") {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak M".rand(1, 8);
			}
			else {
				$rak = "Rak N".rand(1, 8);
			}
		}
		else {
			if ($tahun > 2010 && $tahun < date('Y')) {
				$rak = "Rak K".rand(1, 8);
			}
			else {
				$rak = "Rak L".rand(1, 8);
			}
		}

		$image = $request->file('sampul');
		if(!empty($image)){
			$tujuan = "public/img/buku/";
			$namaImage = $judul.'.'.
			$request->file('sampul')->getClientOriginalExtension();

			$request->file('sampul')->move(base_path().'/'.$tujuan, $namaImage);

		}

		$buku = new Buku;

		$buku->judul = $judul;
		$buku->pengarang = $request->input('pengarang');
		$buku->th_terbit = $tahun;
		$buku->penerbit = $request->input('penerbit');
		$buku->kategori = $kat;
		$buku->gambar = "img/buku/".$namaImage;
		$buku->rangkuman = $request->input('rangkuman');
		$buku->jumlah_buku = $request->input('jum_buku');
		$buku->lokasi = $rak;
		$buku->jum_temp = $request->input('jum_buku');
		$buku->tgl_input = $request->input('tgl_input');

		$buku->save();

		return redirect('Data Buku');
	}
	public function Update_Buku(Request $request, $id=null) {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
		$buku = Buku::find($id);

		$judul = $request->input('judul');
		$image = $request->file('sampul');
		if(!empty($image)){
			$tujuan = "public/img/buku/";
			$gambar = $judul.'.'.
			$request->file('sampul')->getClientOriginalExtension();

			$request->file('sampul')->move(base_path().'/'.$tujuan, $gambar);

		}

		$buku->judul = $judul;
		$buku->pengarang = $request->input('pengarang');
		$buku->th_terbit = $request->input('th_terbit');
		$buku->penerbit = $request->input('penerbit');
		$buku->kategori = $request->input('kategori');
		$buku->jumlah_buku = $request->input('jum_buku');
		$buku->gambar = "img/buku/".$gambar;
		$buku->tgl_input = $request->input('tgl_input');

		$buku->save();

		return redirect('Data Buku');
	}
	public function printPDF(Request $requst)	{
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}

		$pdf = App::make('dompdf.wrapper');

		$buku = Buku::orderBy('judul', 'asc')
		->get()->toArray();

		$pdf->loadView('pdf.Print-PDF-Buku', compact('buku'));
		$pdf->setPaper('A4')->setOrientation('potrait');

        $savename="Daftar Buku PerPusWeb.pdf";

        return $pdf->stream($savename);

	}
	public function export() {
		$this->middleware('auth');
		if (Auth::guest()) {
			return redirect('auth/login');
		}
        Excel::create('Daftar Buku Perpusweb.com', function($excel) {
        	
			$excel->sheet('sheet', function($sheet) {
				$daftar = Buku::orderBy('judul', 'asc')
	        	->get()->toArray();

				$sheet->getStyle('A1')->applyFromArray(array(
			        'fill' => array(
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

				$sheet->loadView('excel.print-Excel', compact('daftar'));
			})->export('xlsx');
		});
    }


}