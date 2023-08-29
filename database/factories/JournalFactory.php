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
            'is_closed'              => false,
            'created_at'             => Carbon::now(),
            'updated_at'             => Carbon::now(),
        ];
    }

    public function makeJournalWithRelations(): array
    {
        $journalFactory = Journal::factory()->make();
        $victimFactory = Victim::factory()->make();
        $attackerFactory = Attacker::factory()->make();

        return array_merge($journalFactory->toArray(),
            [
                "victim"   => $victimFactory->toArray(),
                "attacker" => $attackerFactory->toArray()
            ]);
    }
}
