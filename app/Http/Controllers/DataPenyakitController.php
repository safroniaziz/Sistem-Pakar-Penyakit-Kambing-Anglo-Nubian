<?php

namespace App\Http\Controllers;

use App\Models\DataPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataPenyakitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }
    
    public function index(){
        $penyakits = DataPenyakit::all();
        return view('backend/penyakit.index',[
            'penyakits'  =>  $penyakits,
        ]);
    }

    public function post(Request $request){
        $kode = DataPenyakit::orderBy('created_at','desc')->first();
        if (empty($kode) || $kode == "") {
            $kode_penyakit = "001";
        }else{
            $urutan = (int) substr($kode->kode_penyakit, 2);
            $kode_baru = $urutan+1;
            $kode_penyakit = sprintf("%03s", $kode_baru);
        }
        
        $model = $request->all();
        $model['foto'] = null;

        if ($request->hasFile('foto')) {
            $model['foto'] = Str::slug($request->nama_penyakit).'-'.$kode_penyakit.uniqid().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_penyakit/'), $model['foto']);
        }

        DataPenyakit::create([
            'kode_penyakit' =>  $kode_penyakit,
            'nama_penyakit' =>  $request->nama_penyakit,
            'deskripsi'   =>  $request->deskripsi,
            'foto'    =>  $model['foto'],
            'video'    =>  $request->video,
        ]);

        return redirect()->route('penyakit')->with(['success'    =>  'Data Penyakit Berhasil Ditambahkan']);
    }

    public function edit($id){
        $kode_penyakit = sprintf("%03s", $id);
        $penyakit = DataPenyakit::where('kode_penyakit',$kode_penyakit)->first();
        return $penyakit;
    }

    public function update(Request $request){
        $foto = DataPenyakit::find($request->id);
        $model = $request->all();
        $model['foto_edit'] = $foto->foto;
        if ($request->hasFile('foto_edit')){
            if (!$foto->foto == NULL){
                unlink(public_path('upload/foto_penyakit/'.$foto->foto));
            }
            $model['foto_edit'] = Str::slug($request->nama_penyakit).'-'.$request->id.uniqid().'.'.$request->foto_edit->getClientOriginalExtension();
            $request->foto_edit->move(public_path('/upload/foto_penyakit/'), $model['foto_edit']);
        }

        DataPenyakit::where('kode_penyakit',$request->id)->update([
            'nama_penyakit' =>  $request->nama_penyakit_edit,
            'deskripsi'   =>  $request->deskripsi_edit,
            'foto'    =>  $model['foto_edit'],
            'video'    =>  $request->video_edit,
        ]);

        return redirect()->route('penyakit')->with(['success'    =>  'Data Penyakit Berhasil Diubah']);
    }

    public function delete(DataPenyakit $penyakit){
        if (!$penyakit->foto == NULL){
            unlink(public_path('upload/foto_penyakit/'.$penyakit->foto));
        }
        $penyakit->delete();

        return redirect()->route('penyakit')->with(['success'    =>  'Data Penyakit Berhasil Dihapus']);
    }
}
