<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaConocimiento extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function coordinadores(): HasMany{
        return $this->hasMany(Coordinador::class);
    }

    public function materias(): HasMany{
        return $this->hasMany(Materia::class);
    }
}
