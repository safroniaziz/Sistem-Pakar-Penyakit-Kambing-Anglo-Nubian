<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use App\Models\DataSolusi;
use App\Models\PenangananPenyakit;
use Illuminate\Http\Request;

class DataPenangananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    
    public function index(){
        $penanganans = PenangananPenyakit::all();
        $penyakits = DataPenyakit::all();
        $solusis = DataSolusi::all();
        return view('backend/penanganan.index',[
            'penanganans'  =>  $penanganans,
            'penyakits'  =>  $penyakits,
            'solusis'  =>  $solusis,
        ]);
    }

    public function post(Request $request){
        PenangananPenyakit::create([
            'solusi_id' =>  $request->solusi_id,
            'penyakit_id'    =>  $request->penyakit_id,
        ]);

        return redirect()->route('penanganan')->with(['success'    =>  'Data Penanganan Berhasil Ditambahkan']);
    }

    public function edit($id){
        $penanganan = PenangananPenyakit::where('id',$id)->first();
        return $penanganan;
    }

    public function update(Request $request){
        PenangananPenyakit::where('id',$request->id)->update([
            'solusi_id' =>  $request->solusi_id,
            'penyakit_id'    =>  $request->penyakit_id,
        ]);

        return redirect()->route('penanganan')->with(['success'    =>  'Data Penanganan Berhasil Diubah']);
    }

    public function delete(PenangananPenyakit $penanganan){
        $penanganan->delete();
        return redirect()->route('penanganan')->with(['success'    =>  'Data Penanganan Berhasil Dihapus']);
    }
}
