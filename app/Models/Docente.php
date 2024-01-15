<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docentes';

    protected $fillable = ['id_curri','nombre_doc','apellido_doc','cedula_doc','fecha_nac_doc','direccion_doc','correo_doc','telefono_doc'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curriculum()
    {
        return $this->hasOne('App\Models\Curriculum', 'id', 'id_curri');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentesMaterias()
    {
        return $this->hasMany('App\Models\DocentesMateria', 'id_doc', 'id');
    }
    
}
