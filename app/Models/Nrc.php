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
        return $this->belongsTo(Semestre::class, 'id_sem');
    }

    public function materia() : BelongsTo{
        return $this->belongsTo(Materia::class, 'id_mat');
    }

    public function carrera() : BelongsTo{
        return $this->belongsTo(Carrera::class, 'id_car');
    }

    public function docente_materia() : BelongsTo{
        return $this->belongsTo(DocenteMateria::class, 'id_dm');
    }
    //Grafica IngAreConoChart
    public function docente_materias()
    {
        return $this->hasMany(DocenteMateria::class, 'id');
    }
    //GRAFICA NRC POR AREA
    public function area(): BelongsTo
    {
        return $this->belongsTo(AreaConocimiento::class, 'id');
    }

}