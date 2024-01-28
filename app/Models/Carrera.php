<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrera extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function nrcs(): HasMany{
        return $this->hasMany(NRC::class,'id_car');
    }
  
}
