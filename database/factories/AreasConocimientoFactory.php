<?php

namespace Database\Factories;

use App\Models\AreasConocimiento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreasConocimientoFactory extends Factory
{
    protected $model = AreasConocimiento::class;

    public function definition()
    {
        return [
			'nombre_are' => $this->faker->name,
        ];
    }
}
