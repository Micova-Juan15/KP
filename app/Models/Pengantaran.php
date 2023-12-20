<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantaran extends Model
{
    use HasFactory;
    public function sopir()
    {
        return $this->belongsTo(Sopir::class,'idsopir');
    }
    public function truk()
    {
        return $this->belongsTo(Truk::class,'idtruk');
    }
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class,'idpenjualan');
    }


}
