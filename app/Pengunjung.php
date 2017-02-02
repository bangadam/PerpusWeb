<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model {

	protected $table = 'pengunjung';
	protected $primaryKey = "id";
	protected $fillable;
}
