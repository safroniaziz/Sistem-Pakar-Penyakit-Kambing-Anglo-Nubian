<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananPenyakit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penyakit(){
        return $this->belongsTo(DataPenyakit::class, 'penyakit_id');
    }

    public function solusi(){
        return $this->belongsTo(DataSolusi::class, 'solusi_id');
    }
}
