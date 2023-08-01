<?php

namespace App\Http\Controllers;

use App\Models\BasicPengetahuan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function diagnosa(Request $request){
        // Mendapatkan data gejala dari array yang diberikan
        $dataGejala =  $request->gejala_id;
        $penyakits = DataPenyakit::orderBy('created_at', 'asc')->get();
        $pengetahuanPerGejala = [];
        $counter = 1;
        foreach ($dataGejala as $gejala_id) {
            // Ambil data gejala berdasarkan gejala_id
            $gejala = DataGejala::find($gejala_id);
            $gejala_nilai = $gejala ? $gejala->nilai : 0;
            $gejala_teta = $gejala ? $gejala->teta : 0;

            // Ambil data penyakit yang terkait dengan gejala berdasarkan kode_gejala
            $penyakit_terkait = BasicPengetahuan::where('kode_gejala', $gejala_id)->pluck('kode_penyakit')->toArray();

            $pengetahuanPerGejala[] = [
                'gejala_id' => $gejala_id,
                'penyakit_terkait' => $penyakit_terkait,
                'm' => $gejala_nilai,
                'teta' => $gejala_teta,
            ];
            $counter++;
        }

        return $pengetahuanPerGejala;

        if (count($pengetahuanPerGejala ) == 4) {
            $m1 = $pengetahuanPerGejala[0]['m'];
            $m2 = $pengetahuanPerGejala[1]['m'];
            $teta1 = $pengetahuanPerGejala[0]['teta'];
            $teta2 = $pengetahuanPerGejala[1]['teta'];


            $m3m1 = $m1*$m2;
            $teta3m1 = $teta1*$m2;
            $teta3m2 = $m1*$teta2;
            $teta3teta2 = $teta1*$teta2;
            //batas

            $m3m2 = $m3m1+$teta3m1;
            $m3m1 = $teta3m2;
            $teta3m = $teta3teta2;

            $m3 = $pengetahuanPerGejala[2]['m'];
            $teta3 = $pengetahuanPerGejala[2]['teta'];

            $m5m2 = $m3m2 * $m3;
            $m5m1 = $m3m1 * $m3;
            $m5teta = $teta3m * $m3;

            $m5teta3 = $m3m2 * $teta3;
            $m5m3 = $m3m1 * $teta3;
            $teta5m = $teta3m * $teta3;
            // batas
            
            $m5 = $m5m2 + $m5m1 + $m5teta;
            $m5_baru = $m5teta3;
            $m5_baru2 = $m5m3;
            $teta5 = $teta5m;

            $m4 = $pengetahuanPerGejala[3]['m'];
            $teta4 = $pengetahuanPerGejala[3]['teta'];
            

            $mhasil = $m5*$m4;
            $mhasil2 = $m5_baru*$m4;
            $mhasil3 = $m5_baru2*$m4;
            $mhasil4 = $teta5*$m4;

            $mhasilteta2 = $m5*$teta4;
            $mhasil2teta2 = $m5_baru*$teta4;
            $mhasil3teta2 = $m5_baru2*$teta4;
            $teta5teta2 = $teta5*$teta4;

            $mp = $mhasil + $mhasil2 + $mhasil3 + $mhasil4 + $mhasilteta2;


        }
    }
}
