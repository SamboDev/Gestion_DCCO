<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areasconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areasconocimientos';

    protected $fillable = ['nombre_are'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
        return $this->hasMany('App\Models\Materia', 'id_are', 'id');
    }
    
}
