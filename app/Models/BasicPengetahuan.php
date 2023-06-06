<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicPengetahuan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penyakit(){
        return $this->belongsTo(DataPenyakit::class, 'kode_penyakit');
    }

    public function gejala(){
        return $this->belongsTo(DataGejala::class, 'kode_gejala');
    }
}
