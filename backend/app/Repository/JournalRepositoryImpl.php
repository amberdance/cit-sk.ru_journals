<?php

namespace App\Repository;


use App\Http\Resources\JournalCollection;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;

class JournalRepositoryImpl implements JournalRepository
{

    /**
     * @inheritDoc
     */
    public function create(array $data, Attacker $attacker, Victim $victim): Journal
    {
        $journal = new Journal();
        $journal->detection_date = $data["detection_date"];
        $journal->zav_sector_notice_date = $data["zav_sector_notice_date"];
        $journal->group_notice_date = $data["group_notice_date"];
        $journal->attacker_id = $attacker->id;
        $journal->victim_id = $victim->id;
        $journal->save();

        return $journal;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): JournalCollection
    {
        return new JournalCollection(Journal::all());
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
