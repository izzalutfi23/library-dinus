<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
Use Alert;

class KategoriBukuController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('admin.page.buku.kategori', compact('kategori'));
    }

    public function store(Request $request){
        Kategori::create([
            'nama' => $request->nama
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        Kategori::whereId($id)->update([
            'nama' => $request->nama
        ]);

        Alert::success('Berhasil','Data berhasil diubah !!!');
        return redirect()->back();
    }

    public function destroy($id){
        Kategori::whereId($id)->delete();
        Alert::success('Berhasil','Data berhasil dihapus !!!');
        return redirect()->back();
    }
}
