<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    public function barangmentah()
    {
        return $this->belongsTo(barangmentah::class,'idbarangmentah');
    }
}
