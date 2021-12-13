<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.page.user.index', compact('user'));
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Alert::success('Berhasil','Data berhasil ditambahkan !!!');
        return redirect()->back();
    }

    public function destroy($id){
        User::whereId($id)->delete();
        Alert::success('Berhasil','Data berhasil dihapus !!!');
        return redirect()->back();
    }
}
