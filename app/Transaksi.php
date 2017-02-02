<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {

	protected $table = 'trans_pinjam';
	protected $primaryKey = "id";
	protected $fillable;
}
