<?php
namespace App\Http\Controllers;  
  
use Auth; 
use Request;  
use App\User;
use App\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
  
class CustomAuth extends Controller {  

    use AuthenticatesAndRegistersUsers;
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }
  
    public function getLogin() {
        $this->middleware('auth');
        if (Auth::guest()) {
            $error = 'no';
            return view('Login', compact('error'));
            /*echo bcrypt("petugas_perpusweb");*/
        } elseif(Auth::user()->type == "user" && Auth::user()->status == "non-active") {
            $error = "status";
            return view('Login', compact('error'));
        } elseif(Auth::user()->type == "admin") {
            return redirect('2016/dashboard');
        } elseif(Auth::user()->type == "user" && Auth::user()->status == "active") {
            return redirect('User/index');
        }
    }
  
    public function postLogin() {
        $username = Request::input('username');  
        $password = Request::input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'type' => "admin"])) {   
            return redirect('2016/dashboard');
        }
        elseif(Auth::attempt(['username' => $username, 'password' => $password, 'type' => "user", 'status' => 'active'])) {
            return redirect('User/index');
        }
        elseif(Auth::attempt(['username' => $username, 'password' => $password, 'type' => "user", 'status' => 'non-active'])) {
            $error = "status";
            return view('Login', compact('error'));
        }
        else{
            $error = 'yes';
            return view('Login', compact('error'));
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/'); 
    }

    public function detail($id=null){
        $admin = User::find($id);

        return view('admin/DetailAdmin', compact('admin'));
    }
} 