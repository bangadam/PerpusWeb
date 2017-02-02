<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ParentCtrl extends Controller {
	public function __construct()
    {
        if(Auth::guest()){
            die("Please login first. <a href='".url('/auth/login')."'> Click here </a> to login");
        }
        else {
            $url=$_SERVER["REQUEST_URI"];
            $tes=explode('/',$url);   
            foreach($tes as $key => $kata){
                if($kata=="public"){
                    $awal=$key;
                }
            }
            $role="";
            for($i=$awal+1;$i<count($tes);$i++){
                $role .=str_replace(' ','',$tes[$i]);
                if(($i+1)==count($tes)){
                    $role.='/';
                }
            }
        }
    }

}