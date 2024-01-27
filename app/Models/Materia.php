<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function nrcs(): HasMany{
        return $this->hasMany(NRC::class);
    }

    public function materias(): HasMany{
        return $this->hasMany(Materia::class);
    }

    public function area_conocimiento() : BelongsTo{
        return $this->belongsTo(AreaConocimiento::class, 'id_are');
    }
    
    public function docentes(){
        return $this->belongsToMany(Docente::class, 'docente_materias', 'id_doc', 'id_mat');
    }
}
