<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getShortJudulAttribute(){
        return substr($this->judul, 0, random_int(40,60)). '...';
    }
}
