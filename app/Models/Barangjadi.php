<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangjadi extends Model
{
    use HasFactory;
    public function resep()
    {
        return $this->hasMany(Resep::class,'idbarangjadi');
    }

}
