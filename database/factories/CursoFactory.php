<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        return [
			'id_mat' => $this->faker->name,
			'id_sem' => $this->faker->name,
			'id_car' => $this->faker->name,
			'id_dm' => $this->faker->name,
        ];
    }
}
