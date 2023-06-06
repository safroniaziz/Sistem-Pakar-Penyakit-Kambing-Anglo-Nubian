<?php

use App\Http\Controllers\ArtikelTerkaitController;
use App\Http\Controllers\BasicPengetahuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DataPenangananController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DataPenyakitController;
use App\Http\Controllers\DataSolusiController;
use App\Http\Controllers\DiagnosaController;
use App\Models\Artikel;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $artikels = Artikel::all();
    $penyakits = DataPenyakit::all();
    return view('layouts.app',[
        'artikels'  =>  $artikels,
        'penyakits'  =>  $penyakits,
    ]);
})->name('welcome');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register_user', function () {
    return view('auth.register');
})->name('register_user');

Route::post('/register_user', function (Request $request) {
    $kode = User::orderBy('created_at','desc')->first();
    if (empty($kode) || $kode == "") {
        $kode_pengguna = "001";
    }else{
        $urutan = (int) substr($kode->kode_pengguna, 2);
        $kode_baru = $urutan+1;
        $kode_pengguna = sprintf("%03s", $kode_baru);
    }
    User::create([
        'kode_pengguna' =>  $kode_pengguna,
        'nama_pengguna' =>  $request->nama_pengguna,
        'email' =>  $request->email,
        'jenis_kelamin' =>  $request->jenis_kelamin,
        'password'  =>  bcrypt($request->password),
        'alamat'    =>  $request->alamat,
        'pekerjaan' =>  $request->pekerjaan,
        'role'      =>  'user',
    ]);

    return redirect()->route('login')->with(['success'  =>  'Data User Berhasil Disimpan']);
})->name('register.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/diagnosa', function () {
        $gejalas = DataGejala::all();
        return view('diagnosa',[
            'gejalas'   =>  $gejalas,
        ]);
    })->name('diagnosa');

    Route::post('/diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa.post');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(ArtikelTerkaitController::class)->group(function () {
        Route::get('/artikel_terkait', 'index')->name('artikel');
        Route::post('/artikel_terkait', 'post')->name('artikel.post');
        Route::get('/artikel_terkait/{artikel}/edit', 'edit')->name('artikel.edit');
        Route::patch('/artikel_terkait/update', 'update')->name('artikel.update');
        Route::delete('/artikel_terkait/{artikel}/delete', 'delete')->name('artikel.delete');
    });

    Route::controller(DataPenyakitController::class)->group(function () {
        Route::get('/data_penyakit', 'index')->name('penyakit');
        Route::post('/data_penyakit', 'post')->name('penyakit.post');
        Route::get('/data_penyakit/{id}/edit', 'edit')->name('penyakit.edit');
        Route::patch('/data_penyakit/update', 'update')->name('penyakit.update');
        Route::delete('/data_penyakit/{penyakit}/delete', 'delete')->name('penyakit.delete');
    });

    Route::controller(DataGejalaController::class)->group(function () {
        Route::get('/data_gejala', 'index')->name('gejala');
        Route::post('/data_gejala', 'post')->name('gejala.post');
        Route::get('/data_gejala/{id}/edit', 'edit')->name('gejala.edit');
        Route::patch('/data_gejala/update', 'update')->name('gejala.update');
        Route::delete('/data_gejala/{gejala}/delete', 'delete')->name('gejala.delete');
    });

    Route::controller(DataSolusiController::class)->group(function () {
        Route::get('/data_solusi', 'index')->name('solusi');
        Route::post('/data_solusi', 'post')->name('solusi.post');
        Route::get('/data_solusi/{id}/edit', 'edit')->name('solusi.edit');
        Route::patch('/data_solusi/update', 'update')->name('solusi.update');
        Route::delete('/data_solusi/{solusi}/delete', 'delete')->name('solusi.delete');
    });

    Route::controller(DataPenggunaController::class)->group(function () {
        Route::get('/data_pengguna', 'index')->name('pengguna');
        Route::post('/data_pengguna', 'post')->name('pengguna.post');
        Route::get('/data_pengguna/{id}/edit', 'edit')->name('pengguna.edit');
        Route::patch('/data_pengguna/update', 'update')->name('pengguna.update');
        Route::delete('/data_pengguna/{pengguna}/delete', 'delete')->name('pengguna.delete');
    });

    Route::controller(DataPenangananController::class)->group(function () {
        Route::get('/data_penanganan', 'index')->name('penanganan');
        Route::post('/data_penanganan', 'post')->name('penanganan.post');
        Route::get('/data_penanganan/{id}/edit', 'edit')->name('penanganan.edit');
        Route::patch('/data_penanganan/update', 'update')->name('penanganan.update');
        Route::delete('/data_penanganan/{penanganan}/delete', 'delete')->name('penanganan.delete');
    });

    Route::controller(BasicPengetahuanController::class)->group(function () {
        Route::get('/basic_pengetahuan', 'index')->name('basic_pengetahuan');
        Route::post('/basic_pengetahuan', 'post')->name('basic_pengetahuan.post');
        Route::get('/basic_pengetahuan/{id}/edit', 'edit')->name('basic_pengetahuan.edit');
        Route::patch('/basic_pengetahuan/update', 'update')->name('basic_pengetahuan.update');
        Route::delete('/basic_pengetahuan/{basicPengetahuan}/delete', 'delete')->name('basic_pengetahuan.delete');
    });

});
