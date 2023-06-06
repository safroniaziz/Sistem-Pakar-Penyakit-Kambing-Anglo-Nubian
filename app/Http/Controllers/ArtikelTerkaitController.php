<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelTerkaitController extends Controller
{
    public function index(){
        $artikels = Artikel::all();
        return view('backend/artikel.index',[
            'artikels'  =>  $artikels,
        ]);
    }

    public function post(Request $request){
        Artikel::create([
            'judul' =>  $request->judul,
            'content'   =>  $request->content,
            'sumber'    =>  $request->sumber,
        ]);

        return redirect()->route('artikel')->with(['success'    =>  'Artikel Terkait Berhasil Ditambahkan']);
    }

    public function edit($id){
        $artikel = Artikel::where('id',$id)->first();
        return $artikel;
    }

    public function update(Request $request){
        Artikel::create([
            'judul' =>  $request->judul_edit,
            'content'   =>  $request->content_edit,
            'sumber'    =>  $request->sumber_edit,
        ]);

        return redirect()->route('artikel')->with(['success'    =>  'Artikel Terkait Berhasil Diubah']);
    }    
}
