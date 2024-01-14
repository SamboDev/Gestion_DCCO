<?php

namespace Database\Factories;

use App\Models\Privilegio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrivilegioFactory extends Factory
{
    protected $model = Privilegio::class;

    public function definition()
    {
        return [
			'nombre_priv' => $this->faker->name,
        ];
    }
}
