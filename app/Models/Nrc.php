<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nrc extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function semestre(): BelongsTo
    {
        return $this->belongsTo(Semestre::class);
    }

    // public function materia(): BelongsTo
    // {
    //     return $this->belongsTo(Materia::class);
    // }
    // En el modelo Nrc
    // public function materia()
    // {
    //     return $this->belongsTo(Materia::class, 'id_mat');
    // }
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'id_mat');
    }


    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id');
    }
    //GRAFICA NRC POR AREA
    public function area(): BelongsTo
    {
        return $this->belongsTo(AreaConocimiento::class, 'id');
    }
    //ING POR AREA
    public function docente_materias()
    {
        return $this->hasMany(DocenteMateria::class, 'id');
    }


    public function area_conocimiento(): BelongsTo
    {
        return $this->belongsTo(AreaConocimiento::class, 'id_are');
    }


}
