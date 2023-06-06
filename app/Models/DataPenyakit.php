<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    protected $primaryKey = 'kode_penyakit';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    protected $guarded = [];

    public function solusis()
    {
        return $this->belongsToMany(DataSolusi::class, 'penanganan_penyakits');
    }

    public function penangananPenyakits(){
        return $this->hasMany(PenangananPenyakit::class, 'penyakit_id');
    }
}
