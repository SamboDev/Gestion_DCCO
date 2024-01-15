<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocenteFactory extends Factory
{
    protected $model = Docente::class;

    public function definition()
    {
        return [
			'id_curri' => $this->faker->name,
			'nombre_doc' => $this->faker->name,
			'apellido_doc' => $this->faker->name,
			'cedula_doc' => $this->faker->name,
			'fecha_nac_doc' => $this->faker->name,
			'direccion_doc' => $this->faker->name,
			'correo_doc' => $this->faker->name,
			'telefono_doc' => $this->faker->name,
        ];
    }
}
