<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'materias';

    protected $fillable = ['id_are','codigo_mat','nombre_mat','requisito_doc_mat','horas_trabAuto_mat','horas_doc_mat','horas_invest_mat','horas_total','descripcion_mat'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areasconocimiento()
    {
        return $this->hasOne('App\Models\Areasconocimiento', 'id', 'id_are');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->hasMany('App\Models\Curso', 'id_mat', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentesmaterias()
    {
        return $this->hasMany('App\Models\Docentesmateria', 'id_mat', 'id');
    }
    
}
