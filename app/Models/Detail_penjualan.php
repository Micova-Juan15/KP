<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    
    use HasFactory;
    public function barangjadi()
    {
        return $this->belongsTo(Barangjadi::class,'idbarang');
    }

}
