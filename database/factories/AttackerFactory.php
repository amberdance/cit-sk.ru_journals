<?php

namespace Database\Factories;

use App\Models\Attacker;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttackerFactory extends Factory
{
    protected $model = Attacker::class;

    public function definition(): array
    {
        return [
            'ipv4'        => $this->faker->ipv4(),
            'type'        => $this->faker->word(),
            'description' => $this->faker->text(),
            'country'     => $this->faker->country()
        ];
    }
}
