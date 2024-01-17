<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'curriculums';

    protected $fillable = ['institucion_cur','fecha_gra_cur','titulo_cur','interes_inv_cur','premios_cur','cursos_cur','otras_responsabilidades_cur'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentes()
    {
        return $this->hasMany('App\Models\Docente', 'id_curri', 'id');
    }
    
}
