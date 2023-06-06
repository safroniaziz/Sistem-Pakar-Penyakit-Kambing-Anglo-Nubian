<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataPenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    
    public function index(){
        $penggunas = User::all();
        return view('backend/pengguna.index',[
            'penggunas'  =>  $penggunas,
        ]);
    }

    public function post(Request $request){
        $kode = User::orderBy('created_at','desc')->first();
        if (empty($kode) || $kode == "") {
            $kode_pengguna = "001";
        }else{
            $urutan = (int) substr($kode->kode_pengguna, 2);
            $kode_baru = $urutan+1;
            $kode_pengguna = sprintf("%03s", $kode_baru);
        }

        User::create([
            'kode_pengguna'   =>  $kode_pengguna,
            'nama_pengguna' =>  $request->nama_pengguna,
            'email'    =>  $request->email,
            'pekerjaan'    =>  $request->pekerjaan,
            'alamat'    =>  $request->alamat,
            'jenis_kelamin'    =>  $request->jenis_kelamin,
            'password'  =>  bcrypt($request->password),
        ]);

        return redirect()->route('pengguna')->with(['success'    =>  'Data Pengguna Berhasil Ditambahkan']);
    }

    public function edit($id){
        $kode_penyakit = sprintf("%03s", $id);
        $pengguna = User::where('kode_pengguna',$kode_penyakit)->first();
        return $pengguna;
    }

    public function update(Request $request){
        User::where('kode_pengguna',$request->id)->update([
            'nama_pengguna' =>  $request->nama_pengguna,
            'email'    =>  $request->email,
            'pekerjaan'    =>  $request->pekerjaan,
            'alamat'    =>  $request->alamat,
            'jenis_kelamin'    =>  $request->jenis_kelamin,
            'password'  =>  bcrypt($request->password),
        ]);

        return redirect()->route('pengguna')->with(['success'    =>  'Data Pengguna Berhasil Diubah']);
    }

    public function delete(User $pengguna){
        $pengguna->delete();
        return redirect()->route('pengguna')->with(['success'    =>  'Data Pengguna Berhasil Dihapus']);
    }
}
