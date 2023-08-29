<?php

namespace Database\Factories;

use App\Models\Attacker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AttackerFactory extends Factory
{
    protected $model = Attacker::class;

    public function definition()
    {
        return [
            'ipv4'        => $this->faker->word(),
            'type'        => $this->faker->word(),
            'description' => $this->faker->text(),
            'country'     => $this->faker->country(),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
