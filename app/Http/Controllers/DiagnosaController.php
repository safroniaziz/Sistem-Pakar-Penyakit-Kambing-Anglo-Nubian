<?php

namespace App\Http\Controllers;

use App\Models\BasicPengetahuan;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection; // Pastikan Anda sudah mengimport Illuminate\Support\Collection jika belum diimpor sebelumnya

class DiagnosaController extends Controller
{
    public function diagnosa(Request $request){
        $gejalaIds = $request->gejala_id;
        $dataGejala = [];

        foreach ($gejalaIds as $gejalaId) {
            $gejala = DataGejala::find($gejalaId);

            if ($gejala) {
                $penyakits = $gejala->penyakits->pluck('kode_penyakit');
                $dataGejala[] = [
                    'm' => $gejala->nilai,
                    'teta' => $gejala->teta,
                    'penyakits' => $penyakits,
                ];
            }
        }

        $pembagi = [
            '0' =>  [
                    'm' =>  $dataGejala[0]['m'],
                    'penyakits' =>  $dataGejala[0]['penyakits'],
                ],
        ];
        
        $tetam = $dataGejala[0]['teta'];
        $pembagiBaru_last = 0;
        $m_last_sebelumnya = 0;
        for ($i=1; $i <count($dataGejala) ; $i++) { 
            $no=1;
            $teta_last = 0;
            for ($j=0; $j < count($pembagi); $j++) { 
                $tetabaru = 0;
                // return 
                $penyakits_pembagi = ($pembagi[$j]['penyakits'] instanceof Collection) ? $pembagi[$j]['penyakits']->toArray() : $pembagi[$j]['penyakits'];
                $penyakits_dataGejala = ($dataGejala[$i]['penyakits'] instanceof Collection) ? $dataGejala[$i]['penyakits']->toArray() : $dataGejala[$i]['penyakits'];

                $common_penyakits = array_intersect($penyakits_pembagi, $penyakits_dataGejala);
                // $common_penyakits = array_intersect($pembagi[$j]['penyakits']->toArray(), $dataGejala[$i]['penyakits']->toArray());
                usort($common_penyakits, function($a, $b) {
                    // Ubah ke angka untuk membandingkan dengan urutan numerik yang benar
                    $a = (int)$a;
                    $b = (int)$b;

                    // Mengurutkan dengan urutan "001", "004", hingga "005"
                    return $a - $b;
                });
                $jumlah =  count($common_penyakits);
                if ($jumlah > 0) {
                    $m_last = ($pembagi[$j]['m'] * $dataGejala[$i]['m']) + ($tetam * $dataGejala[$i]['m']);
                    $teta_last = $tetam * $dataGejala[$i]['teta'];
                    $pembagibaru_last = $pembagi[$j]['m'] * $dataGejala[$i]['teta'];
                    $indexBaru_last = [
                        'm' => $m_last,
                        'penyakits' => $common_penyakits,
                    ];
                    $m_last_sebelumnya = $m_last;
                }else{
                    $m_last = $m_last_sebelumnya;
                    $teta   =  $pembagi[$j]['m'] * $dataGejala[$i]['m'];
                    $teta_last = $tetam * $dataGejala[$i]['teta'] + $teta;
                    $pembagibaru_last = $pembagi[$j]['m'] * $dataGejala[$i]['teta'];
                    $indexBaru_last = [
                        'm' => $m_last,
                        'penyakits' => $common_penyakits,
                    ];
                    $m_last_sebelumnya = $m_last;
                }
                $pembagiBaru_last += $pembagibaru_last; // Akumulasi nilai pembagiBaru_last
                // $pembagi[0]['m'] = $pembagiBaru_last;
                // $pembagi[] = $indexBaru_last;
            }
            $pembagi[0]['m'] = $pembagibaru_last;
            $pembagi[] = $indexBaru_last;
            // return $pembagi;
        }
        // return "Nilai m_last: " . $m_last . "<br>";
        // return "Nilai teta_last: " . $teta_last . "<br>";
        // return "Nilai pembagibaru_last: ";
        // return $pembagibaru_last;
        // return "<br>";
        // return "Nilai indexBaru_last: ";
        // return $indexBaru_last;
        // return "Nilai m_last: " . $m_last . "<br>"
        //  . "Nilai teta_last: " . $teta_last . "<br>"
        //  . "Nilai pembagibaru_last: " . json_encode($pembagibaru_last) . "<br>"
        //  . "Nilai indexBaru_last: " . json_encode($indexBaru_last);

        $hasil = $indexBaru_last;
        $penyakit = DataPenyakit::where('kode_penyakit',$indexBaru_last['penyakits'][0])->first();
        $gejalas = DataGejala::all();
        return view('diagnosa',compact('hasil','gejalas','penyakit','m_last'));
    }

    
}
