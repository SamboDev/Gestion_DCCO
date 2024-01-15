<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MateriaFactory extends Factory
{
    protected $model = Materia::class;

    public function definition()
    {
        return [
			'id_are' => $this->faker->name,
			'codigo_mat' => $this->faker->name,
			'nombre_mat' => $this->faker->name,
			'requisito_doc_mat' => $this->faker->name,
			'horas_trabAuto_mat' => $this->faker->name,
			'horas_doc_mat' => $this->faker->name,
			'horas_invest_mat' => $this->faker->name,
			'horas_total' => $this->faker->name,
			'descripcion_mat' => $this->faker->name,
        ];
    }
}
