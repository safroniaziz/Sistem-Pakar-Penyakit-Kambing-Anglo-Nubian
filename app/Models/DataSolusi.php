<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSolusi extends Model
{
    protected $primaryKey = 'kode_solusi';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    protected $guarded = [];

    public function penyakits()
    {
        return $this->belongsToMany(penyakit::class, 'penanganan_penyakits');
    }
}
