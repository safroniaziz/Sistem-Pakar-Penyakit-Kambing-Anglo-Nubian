<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\DataSolusi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function dashboard(){
        $jumlahPenyakit = DataPenyakit::all()->count();
        $jumlah_gejala = DataGejala::all()->count();
        $jumlah_solusi = DataSolusi::all()->count();
        $kasus = DataSolusi::all()->count();
        return view('backend/dashboard');
    }
}
