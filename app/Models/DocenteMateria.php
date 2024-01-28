<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocenteMateria extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function docente(): BelongsTo
    // {
    //     return $this->belongsTo(Docente::class);
    // }

    public function materias(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }
    //GRAFICO ING_AREA
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_doc');
    }
    //GRAFICO TOP ING MATERIA
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'id_mat');
    }
}
