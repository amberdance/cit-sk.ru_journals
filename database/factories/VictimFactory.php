<?php

namespace Database\Factories;

use App\Models\Victim;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VictimFactory extends Factory
{
    protected $model = Victim::class;

    public function definition()
    {
        return [
            'ipv4'       => $this->faker->word(),
            'owner'      => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
