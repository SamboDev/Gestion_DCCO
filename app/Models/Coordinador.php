<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coordinador extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function docente() : BelongsTo{
        return $this->belongsTo(Docente::class);
    }

    public function area_conocimiento() : BelongsTo{
        return $this->belongsTo(AreaConocimiento::class);
    }
}
