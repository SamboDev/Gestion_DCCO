<?php

namespace Database\Factories;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CurriculumFactory extends Factory
{
    protected $model = Curriculum::class;

    public function definition()
    {
        return [
			'institucion_cur' => $this->faker->name,
			'fecha_gra_cur' => $this->faker->name,
			'titulo_cur' => $this->faker->name,
			'interes_inv_cur' => $this->faker->name,
			'premios_cur' => $this->faker->name,
			'cursos_cur' => $this->faker->name,
			'otras_responsabilidades_cur' => $this->faker->name,
        ];
    }
}
