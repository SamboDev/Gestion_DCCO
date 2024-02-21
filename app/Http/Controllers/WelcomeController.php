<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaConocimiento;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Carrera;

class WelcomeController extends Controller
{
    public function mostrarDatos()
    {
        $area= AreaConocimiento::all();
        $materia= Materia::all();
        $docente= Docente::all();
        $carrera= Carrera::all();

        return view('welcome', ['area' => $area, 'materia' => $materia, 'docente' => $docente, 'carrera' => $carrera]);
    }
}
 