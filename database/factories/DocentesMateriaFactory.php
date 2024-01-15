<?php

namespace Database\Factories;

use App\Models\DocentesMateria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocentesMateriaFactory extends Factory
{
    protected $model = DocentesMateria::class;

    public function definition()
    {
        return [
			'id_doc' => $this->faker->name,
			'id_mat' => $this->faker->name,
        ];
    }
}
