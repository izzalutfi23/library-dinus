<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.page.dashboard.index');
    }

    public function search(Request $request){
        $buku = Buku::where('judul','like',"%".$request->key."%")->get();
        return view('admin.page.dashboard.result', compact('buku', 'request'));
    }
}