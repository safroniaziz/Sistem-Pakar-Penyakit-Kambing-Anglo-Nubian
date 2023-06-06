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

        $model = $request->all();
        $model['foto'] = null;

        if ($request->hasFile('foto')) {
            $model['foto'] = Str::slug($request->nama_gejala).'-'.$kode_gejala.uniqid().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_gejala/'), $model['foto']);
        }

        DataGejala::create([
            'kode_gejala'   =>  $kode_gejala,
            'nama_gejala' =>  $request->nama_gejala,
            'foto'    =>  $model['foto'],
            'video'    =>  $request->video,
        ]);

        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Ditambahkan']);
    }

    public function edit($id){
        $kode_penyakit = sprintf("%03s", $id);
        $gejala = DataGejala::where('kode_gejala',$kode_penyakit)->first();
        return $gejala;
    }

    public function update(Request $request){
        $foto = DataGejala::find($request->id);
        $model = $request->all();
        $model['foto_edit'] = $foto->foto;
        if ($request->hasFile('foto_edit')){
            if (!$foto->foto == NULL){
                unlink(public_path('upload/foto_gejala/'.$foto->foto));
            }
            $model['foto_edit'] = Str::slug($request->nama_gejala).'-'.$request->id.uniqid().'.'.$request->foto_edit->getClientOriginalExtension();
            $request->foto_edit->move(public_path('/upload/foto_gejala/'), $model['foto_edit']);
        }

        DataGejala::where('kode_gejala',$request->id)->update([
            'nama_gejala' =>  $request->nama_gejala_edit,
            'foto'    =>  $model['foto_edit'],
            'video'    =>  $request->video_edit,
        ]);

        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Diubah']);
    }

    public function delete(DataGejala $gejala){
        $gejala->delete();
        return redirect()->route('gejala')->with(['success'    =>  'Data Gejala Berhasil Dihapus']);
    }
}
