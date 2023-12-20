<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    public function penjual()
    {
        return $this->belongsTo(Penjual::class,'idpenjual');
    }

}
