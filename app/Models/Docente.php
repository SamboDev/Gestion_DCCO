<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

    public function docentes_materias(): HasMany{
        return $this->hasMany(DocenteMateria::class);
    }

    public function coordinadores(): HasMany{
        return $this->hasMany(Coordinador::class);
    }

    public function materias(){
        return $this->belongsToMany(Materia::class, 'docente_materias', 'id_doc', 'id_mat');
    }
    // Relación con la tabla intermedia DocenteMateria
    public function docentesMaterias(): HasMany
    {
        return $this->hasMany(DocenteMateria::class, 'id_doc');
    }
    // Relación inversa con el gráfico TOP ING MATE
    public function materia(): HasMany
    {
        return $this->hasMany(DocenteMateria::class, 'nombre_doc');
    }

}