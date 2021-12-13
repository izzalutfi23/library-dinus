<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pinjam, Pengunjung, Buku};
use Alert;

class PinjamController extends Controller
{
    public function index(){
        $pinjam = Pinjam::all();
        $pengunjung = Pengunjung::all();
        $buku = Buku::all();
        return view('admin.page.pinjam.index', compact('pinjam', 'pengunjung', 'buku'));
    }

    public function store(Request $request){
        Pinjam::create([
            'pengunjung_id' => $request->pengunjung_id,
            'buku_id' => $request->buku_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => '0'
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        Pinjam::whereId($id)->update([
            'pengunjung_id' => $request->pengunjung_id,
            'buku_id' => $request->buku_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => $request->status
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function destroy($id){
        Pinjam::whereId($id)->delete();

        Alert::success('Berhasil','Data berhasil dihapus !!!');
        return redirect()->back();
    }
}
