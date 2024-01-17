<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'privilegios';

    protected $fillable = ['nombre_priv'];
	
}