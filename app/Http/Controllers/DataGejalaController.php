<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataGejalaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    
    public function index(){
        $gejalas = DataGejala::all();
        return view('backend/gejala.index',[
            'gejalas'  =>  $gejalas,
        ]);
    }

    public function post(Request $request){
        $kode = DataGejala::orderBy('created_at','desc')->first();
        if (empty($kode) || $kode == "") {
            $kode_gejala = "001";
        }else{
            $urutan = (int) substr($kode->kode_gejala, 2);
            $kode_baru = $urutan+1;
            $kode_gejala = sprintf("%03s", $kode_baru);
        }

        $nilai = $request->nilai/100;
        $sisa = 100-$request->nilai;
        $teta = $sisa/100;

        DataGejala::create([
            'kode_gejala'   =>  $kode_gejala,
            'nama_gejala' =>  $request->nama_gejala,
            'nilai'    =>  $nilai,
            'teta'    =>  $teta,
        ]);

        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Ditambahkan']);
    }

    public function edit($id){
        $kode_penyakit = sprintf("%03s", $id);
        $gejala = DataGejala::where('kode_gejala',$kode_penyakit)->first();
        return $gejala;
    }

    public function update(Request $request){
        $nilai = $request->nilai/100;
        $sisa = 100-$request->nilai;
        $teta = $sisa/100;

        DataGejala::where('kode_gejala',$request->id)->update([
            'nama_gejala' =>  $request->nama_gejala,
            'nilai'    =>  $nilai,
            'teta'    =>  $teta,
        ]);

        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Diubah']);
    }

    public function delete(DataGejala $gejala){
        $gejala->delete();
        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Dihapus']);
    }
}
