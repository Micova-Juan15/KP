<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_pembelian extends Model
{
    use HasFactory;
    public function barangmentah()
    {
        return $this->belongsTo(Barangmentah::class,'idbarang');
    }
}
