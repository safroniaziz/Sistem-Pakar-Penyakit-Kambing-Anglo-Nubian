<?php

namespace App\Http\Controllers;

use App\Models\BasicPengetahuan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use Illuminate\Http\Request;

class BasicPengetahuanController extends Controller
{
    public function index(){
        $basicPengetahuans = BasicPengetahuan::all();
        $penyakits = DataPenyakit::all();
        $gejalas = DataGejala::all();
        return view('backend/basic_pengetahuan.index',[
            'basicPengetahuans'  =>  $basicPengetahuans,
            'penyakits'  =>  $penyakits,
            'gejalas'  =>  $gejalas,
        ]);
    }

    public function post(Request $request){
        BasicPengetahuan::create([
            'kode_gejala' =>  $request->gejala_id,
            'kode_penyakit'    =>  $request->penyakit_id,
            'mb'    =>  $request->nilai_mb,
            'md'    =>  $request->nilai_md,
        ]);

        return redirect()->route('basic_pengetahuan')->with(['success'    =>  'Data Basic Pengetahuan Berhasil Ditambahkan']);
    }

    public function edit($id){
        $basic_pengetahuan = BasicPengetahuan::where('id',$id)->first();
        return $basic_pengetahuan;
    }

    public function update(Request $request){
        BasicPengetahuan::where('id',$request->id)->update([
            'kode_gejala' =>  $request->gejala_id,
            'kode_penyakit'    =>  $request->penyakit_id,
            'mb'    =>  $request->nilai_mb,
            'md'    =>  $request->nilai_md,
        ]);

        return redirect()->route('basic_pengetahuan')->with(['success'    =>  'Data Basic Pengetahuan Berhasil Diubah']);
    }

    public function delete(BasicPengetahuan $basicPengetahuan){
        $basicPengetahuan->delete();
        return redirect()->route('basic_pengetahuan')->with(['success'    =>  'Data Basic Pengetahuan Berhasil Dihapus']);
    }
}
