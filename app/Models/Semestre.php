<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'semestres';

    protected $fillable = ['nombre_sem'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->hasMany('App\Models\Curso', 'id_sem', 'id');
    }
    
}
