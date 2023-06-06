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
        $gejalas = $request->gejala_id;
        $penyakits = DataPenyakit::orderBy('created_at','asc')->get();
        $variables = array();
        $hasil = array();
        foreach ($penyakits as $penyakit) {
            
            for ($i=0; $i <count($gejalas) ; $i++) { 
                $basic_pengetahuan = BasicPengetahuan::where('kode_penyakit',$penyakit->kode_penyakit)
                                                        ->where('kode_gejala',$gejalas[$i])
                                                        ->first();
                if (!empty($basic_pengetahuan) || $basic_pengetahuan != "") {
                    $variables[$penyakit['kode_penyakit']][] = $gejalas[$i];
                }
            }
            if (empty($variables)) {
                return redirect()->back()->with(['error'    =>  'Tidak ada penyakit yang cocok untuk gejala yang anda pilih']);
            }
            foreach($variables as $key){
                $array[] = $key;
            }
            $mb = 0;
            $md = 0;
            foreach($array[0] as $gejala){
                
                $data_gejala = BasicPengetahuan::where('kode_penyakit',$penyakit->kode_penyakit)
                            ->select('mb','md')
                            ->where('kode_gejala',$gejala)
                            ->first();
                if (!empty($data_gejala)) {
                    $mb_baru = $mb + ($data_gejala->mb * (1 - $mb));
                    $md_baru = $md + ($data_gejala->md * (1 - $md));
                    $cf_baru = $mb_baru - $md_baru;
                    $perhitungan[$penyakit->kode_penyakit][] = [
                            'kode_penyakit' =>  $penyakit->kode_penyakit,
                            'mb'            =>  $mb,
                            'md'            =>  $md,
                            'kode_gejala'   =>  $gejala,
                            'mb_baru'   =>  $mb_baru,
                            'md_baru'   =>  $md_baru,
                            'cf_baru'   =>  $cf_baru,
                        ];
                    $mb = $mb_baru;
                    $md = $md_baru;
                }
            }
            $mb = 0;
            $md = 0;
        }
        foreach($perhitungan as $key){
            $hasil[] = array(
                'kode_penyakit'  =>  end($key)['kode_penyakit'],
                'nilai_cf'  =>  end($key)['cf_baru'],
            );
        }
        $value = max(array_column($hasil, 'nilai_cf'));
        $hasil_diagnosa = array();
        foreach ($hasil as  $hasil2) {
            if ($hasil2['nilai_cf'] == $value) {
                $hasil_diagnosa[] = $hasil2;
            }
        }
        $persen = $hasil_diagnosa[0]['nilai_cf']/1;
        $persentase = $persen*100;
        $diagnosa = Hasil::create([
            'user_id'   =>  Auth::user()->id,
            'kode_penyakit' =>  $hasil_diagnosa[0]['kode_penyakit'],
            'nilai_cf'  =>  $hasil_diagnosa[0]['nilai_cf'],
            'persentase'    => $persentase, 
        ]);
        $notification = [
            'hasil' =>  $hasil,
            'diagnosa' =>  $diagnosa,
        ];
        $gejalas = DataGejala::all();
        return view('diagnosa',[
            'hasil'  =>  $notification['hasil'],
            'diagnosa'  =>  $notification['diagnosa'],
            'gejalas'  =>  $gejalas
        ]);
    }
}
