<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nrc extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function semestre() : BelongsTo{
        return $this->belongsTo(Semestre::class);
    }

    public function materia() : BelongsTo{
        return $this->belongsTo(Materia::class);
    }

    public function carrera() : BelongsTo{
        return $this->belongsTo(Carrera::class);
    }

    public function docente_materia() : BelongsTo{
        return $this->belongsTo(DocenteMateria::class);
    }
}
