<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentesmateria extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docentesmaterias';

    protected $fillable = ['id_doc','id_mat'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->hasMany('App\Models\Curso', 'id_dm', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_doc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_mat');
    }
    
}
