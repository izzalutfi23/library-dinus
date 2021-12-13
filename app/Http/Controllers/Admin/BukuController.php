<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Buku, Kategori};
use Alert;

class BukuController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('admin.page.buku.index', compact('buku', 'kategori'));
    }

    public function store(Request $request){
        $image = $request->file('foto');
        $image->storeAs('public/buku', $image->hashName());

        Buku::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'foto' => $image->hashName()
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $image->storeAs('public/buku', $image->hashName());
            
            Buku::whereId($id)->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun' => $request->tahun,
                'foto' => $image->hashName()
            ]);
        }
        else{
            Buku::whereId($id)->update([
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun' => $request->tahun
            ]);
        }

        Alert::success('Berhasil','Data berhasil diubah !!!');
        return redirect()->back();
    }

    public function destroy($id){
        Buku::whereId($id)->delete();
        Alert::success('Berhasil','Data berhasil dihapus !!!');
        return redirect()->back();
    }
}
