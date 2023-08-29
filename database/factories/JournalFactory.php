<?php

namespace Database\Factories;

use App\Models\Journal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class JournalFactory extends Factory
{
    protected $model = Journal::class;

    public function definition(): array
    {
        return [
            'detection_date'         => Carbon::now(),
            'group_notice_date'      => Carbon::now(),
            'zav_sector_notice_date' => Carbon::now(),
            'attack_type'            => $this->faker->word(),
            'attack_description'     => $this->faker->text(),
            'attacker_ipv4'          => $this->faker->word(),
            'victim_name'            => $this->faker->name(),
            'victim_owner'           => $this->faker->word(),
            'victim_ipv4'            => $this->faker->word(),
            'is_closed'              => $this->faker->boolean(),
            'created_at'             => Carbon::now(),
            'updated_at'             => Carbon::now(),
        ];
    }
}
