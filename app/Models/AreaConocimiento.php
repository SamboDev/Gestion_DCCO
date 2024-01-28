<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AreaConocimiento extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function coordinadores(): HasMany
    {
        return $this->hasMany(Coordinador::class);
    }

    // public function materias(): HasMany
    // {
    //     return $this->hasMany(Materia::class);
    // }
    public function areaConocimento(): HasMany
    {
        return $this->hasMany(AreaConocimiento::class, 'nombre_are');
    }
    // En el modelo AreaConocimiento
    public function materias()
    {
        return $this->hasMany(Materia::class, 'id_are');
    }
    public function docente_materias()
    {
        return $this->hasMany(DocenteMateria::class,'id_doc');
    }
}
