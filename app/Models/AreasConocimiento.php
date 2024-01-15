<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasConocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areasConocimientos';

    protected $fillable = ['nombre_are'];
	
}
