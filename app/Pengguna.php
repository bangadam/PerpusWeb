<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model {

	protected $table = 'admin';
	protected $primaryKey = "user_id";
	protected $fillable;
}
