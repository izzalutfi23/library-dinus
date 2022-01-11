<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('name', 'password'))){
    		return redirect('/dashboard');
    	}else{
            return redirect('/login')->with('status', 'Gagal, Harap cek kembali email atau password anda!');
        }
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
