<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Relación con la tabla intermedia DocenteMateria
    public function docentesMaterias(): HasMany
    {
        return $this->hasMany(DocenteMateria::class, 'id_doc');
    }

    public function coordinadores(): HasMany
    {
        return $this->hasMany(Coordinador::class);
    }

    // Relación inversa con el gráfico TOP ING MATE
    public function materias(): HasMany
    {
        return $this->hasMany(DocenteMateria::class, 'nombre_doc');
    }
}
