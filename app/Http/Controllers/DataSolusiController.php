<?php

namespace App\Http\Controllers;

use App\Models\DataSolusi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataSolusiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    
    public function index(){
        $solusis = DataSolusi::all();
        return view('backend/solusi.index',[
            'solusis'  =>  $solusis,
        ]);
    }

    public function post(Request $request){
        $kode = DataSolusi::orderBy('created_at','desc')->first();
        if (empty($kode) || $kode == "") {
            $kode_solusi = "001";
        }else{
            $urutan = (int) substr($kode->kode_solusi, 2);
            $kode_baru = $urutan+1;
            $kode_solusi = sprintf("%03s", $kode_baru);
        }
        
        DataSolusi::create([
            'kode_solusi' =>  $kode_solusi,
            'nama_solusi' =>  $request->nama_solusi,
        ]);

        return redirect()->route('solusi')->with(['success'    =>  'Data Solusi Berhasil Ditambahkan']);
    }

    public function edit($id){
        $kode_solusi = sprintf("%03s", $id);
        $solusi = DataSolusi::where('kode_solusi',$kode_solusi)->first();
        return $solusi;
    }

    public function update(Request $request){
        DataSolusi::where('kode_solusi',$request->id)->update([
            'nama_solusi' =>  $request->nama_solusi_edit,
        ]);

        return redirect()->route('solusi')->with(['success'    =>  'Data Solusi Berhasil Diubah']);
    }

    public function delete(DataSolusi $solusi){
        $solusi->delete();

        return redirect()->route('solusi')->with(['success'    =>  'Data Solusi Berhasil Dihapus']);
    }
}
