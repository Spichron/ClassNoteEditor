<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Not extends Model
{
    use HasFactory;

    protected $guarded = ['ogrenci_no'];
    public function ogrenci()
    {
        return $this->belongsTo(Ogrenci::class , 'ogrenci_no' , 'no');
    }
}
