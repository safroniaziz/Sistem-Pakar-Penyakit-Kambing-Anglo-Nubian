<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGejala extends Model
{
    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    protected $guarded = [];
}
