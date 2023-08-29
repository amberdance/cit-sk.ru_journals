<?php

namespace Database\Factories;

use App\Models\Victim;
use Illuminate\Database\Eloquent\Factories\Factory;

class VictimFactory extends Factory
{
    protected $model = Victim::class;

    public function definition(): array
    {
        return [
            'ipv4'  => $this->faker->ipv4(),
            'owner' => $this->faker->word()
        ];
    }
}
