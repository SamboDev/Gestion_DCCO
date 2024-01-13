<?php

namespace Database\Factories;

use App\Models\Semestre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SemestreFactory extends Factory
{
    protected $model = Semestre::class;

    public function definition()
    {
        return [
			'nombre_sem' => $this->faker->name,
        ];
    }
}
