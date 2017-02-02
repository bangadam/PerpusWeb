<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Default*/
Route::get('/', 'HomeController@index');
Route::post('buku kunjung', 'FrontCtrl@bk_kunjung');
Route::get('/2016/dashboard', ['middleware' => 'auth', 'uses' => 'FrontCtrl@masuk']);
Route::get('/about', ['middleware' => 'auth', 'uses' => 'FrontCtrl@about']);
Route::get('/Login/user', 'FrontCtrl@user');


/* anggota */
Route::get('/Data Anggota', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@anggota']);
Route::get('/Input Anggota', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@TAnggota']);
Route::get('/update anggota/{id}', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@UAnggota']);
Route::get('/View anggota/{id}', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@VAnggota']);
Route::get('/delete/{id}', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@DAnggota']);
Route::post('input', 'AnggotaCtrl@tambahA');
Route::post('edit/{id}', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@updateA']);
Route::post('input/{id}', ['middleware' => 'auth', 'uses' => 'AnggotaCtrl@tulis']);


/* Buku */
Route::get('/Data Buku', ['middleware' => 'auth', 'uses' => 'BukuCtrl@buku']);
Route::get('/Input Buku', ['middleware' => 'auth', 'uses' => 'BukuCtrl@TBuku']);
Route::post('insert', ['middleware' => 'auth', 'uses' => 'BukuCtrl@tambahB']);
Route::post('insert/{id}', ['middleware' => 'auth', 'uses' => 'BukuCtrl@Update_Buku']);
Route::get('/update/{id}', ['middleware' => 'auth', 'uses' => 'BukuCtrl@UBuku']);
Route::get('/View/{id}', ['middleware' => 'auth', 'uses' => 'BukuCtrl@VBuku']);

/* Transaksi */
Route::get('/Data Transaksi', ['middleware' => 'auth', 'uses' => 'TransCtrl@index']);
Route::get('/Detail/{id}', ['middleware' => 'auth', 'uses' => 'TransCtrl@Detail']);
Route::post('pengembalian/{id}', ['middleware' => 'auth', 'uses' => 'TransCtrl@Pengembalian']);
Route::get('Input Transaksi', ['middleware' => 'auth', 'uses' => 'TransCtrl@jum_buku']);
Route::post('Transaksi', ['middleware' => 'auth', 'uses' => 'TransCtrl@transaksi']);
Route::post('Transaksi Pinjam', ['middleware' => 'auth', 'uses' => 'TransCtrl@TransaksiPinjam']);
Route::post('kelas', 'JsonCtrl@postKelas');
Route::post('kode', 'JsonCtrl@postKode');
Route::post('bulan', 'JsonCtrl@postBulan');
Route::post('tahun', 'JsonCtrl@postTahun');
// Route::post('upload', 'JsonCtrl@postFile');


/* Searching */
Route::get('cari', 'SearchCtrl@getName');
Route::get('pencarian', 'SearchCtrl@getNama');
Route::get('mencari', 'SearchCtrl@getPeminjam');
Route::get('search', 'SearchCtrl@getPinjam');

/* Print */
Route::get('Print-to-PDF/{id}', ['middleware' => 'auth', 'uses' => 'TransCtrl@printPDF']);
Route::get('print', ['middleware' => 'auth', 'uses' => 'BukuCtrl@printPDF']);
Route::get('print-excel', ['middleware' => 'auth', 'uses' => 'BukuCtrl@export']);
Route::get('print-to-excel/{id}', ['middleware' => 'auth', 'uses' => 'TransCtrl@ExportToExcel']);

/*Autentifikasi Login Admin*/
Route::controllers([
	'auth' => 'CustomAuth',
]);
Route::get('detail-admin/{id}', 'CustomAuth@detail');


/*============>>  USER  <<================*/



/* index */
Route::get('User/index', 'UserCtrl@home');
Route::get('User/edit/{id}', 'UserCtrl@edit');
Route::get('User/Contact/Us', 'UserCtrl@contact');

/* pinjam */
Route::post('User/pinjam', 'PinjamCtrl@pinjam');
Route::post('User/peminjaman', 'PinjamCtrl@peminjaman');
Route::get('User/Daftar/pinjam', 'PinjamCtrl@dafpin');
Route::get('User/Daftar/pinjam/{username}', 'PinjamCtrl@DaftarPinjam');

/* pengembalian */
Route::get('User/pengembalian/{id}', 'PinjamCtrl@pengembalian');
Route::post('User/kembali/{id}', 'PinjamCtrl@kembali');

/* registrasi */
Route::post('User/registrasi', 'UserCtrl@Daftar');
Route::post('User/update/{id}', 'UserCtrl@Update');