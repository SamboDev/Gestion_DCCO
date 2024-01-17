<?php

namespace Database\Factories;

use App\Models\Docentesmateria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocentesmateriaFactory extends Factory
{
    protected $model = Docentesmateria::class;

    public function definition()
    {
        return [
			'id_doc' => $this->faker->name,
			'id_mat' => $this->faker->name,
        ];
    }
}
