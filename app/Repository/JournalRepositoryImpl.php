<?php

namespace App\Repository;


use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class JournalRepositoryImpl implements JournalRepository
{

    /**
     * @inheritDoc
     */
    public function create(array $data): Journal
    {
        $journal = new Journal();
        $journal->detection_date = $data["detection_date"];
        $journal->zav_sector_notice_date = $data["zav_sector_notice_date"];
        $journal->group_notice_date = $data["group_notice_date"];

        $attacker = new Attacker();
        $attacker->ipv4 = $data["attacker"]["ipv4"];
        $attacker->description = $data["attacker"]["description"];
        $attacker->type = $data["attacker"]["type"];
        $attacker->country = $data["attacker"]["country"];

        $victim = new Victim();
        $victim->ipv4 = $data["victim"]["ipv4"];
        $victim->owner = $data["victim"]["owner"];

        return DB::transaction(function () use ($journal, $victim, $attacker) {
            $attacker->save();
            $victim->save();
            $journal->attacker_id = $attacker->id;
            $journal->victim_id = $victim->id;
            $journal->push();

            return $journal;
        });
    }

    /**
     * @inheritDoc
     */
    public function findAll(array $filter = []): AnonymousResourceCollection
    {
        // TODO: Implement findById() method.
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): Journal
    {
        // TODO: Implement findById() method.
    }

    /**
     * @inheritDoc
     */
    public function update(array $data): Journal
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}
