<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
Use Alert;

class PengunjungController extends Controller
{
    public function index(){
        $pengunjung = Pengunjung::all();
        return view('admin.page.pengunjung.index', compact('pengunjung'));
    }

    public function store(Request $request){
        Pengunjung::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        Pengunjung::whereId($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        Alert::success('Berhasil','Data berhasil diubah !!!');
        return redirect()->back();
    }

    public function destroy($id){
        Pengunjung::whereId($id)->delete();
        Alert::success('Berhasil','Data berhasil dihapus !!!');
        return redirect()->back();
    }
}
