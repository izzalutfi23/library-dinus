<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index(){
        $buku = Buku::all();
        return view('home.index', compact('buku'));
    }

    public function search(Request $request){
        $buku = Buku::where('judul','like',"%".$request->key."%")->get();
        return view('home.result', compact('buku', 'request'));
    }
}
