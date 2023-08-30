<?php

namespace Database\Factories;

use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;
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
            'attacker_id'            => Attacker::factory()->create(),
            'victim_id'              => Victim::factory()->create(),
            'created_at'             => Carbon::now(),
            'updated_at'             => Carbon::now(),
            'is_closed'              => false,
        ];
    }

    public function makeJournalWithRelations(): array
    {
        $journalFactory = Journal::factory()->make();
        $attackerFactory = Attacker::factory()->make();
        $victimFactory = Victim::factory()->make();


        return array_merge($journalFactory->toArray(),
            [
                "attacker" => $attackerFactory->toArray(),
                "victim"   => $victimFactory->toArray(),
            ]);
    }
}
