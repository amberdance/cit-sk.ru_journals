<?php

namespace App\Repository;


use App\Dto\Journal\JournalCreateDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class JournalRepositoryImpl implements JournalRepository
{

    /**
     * @inheritDoc
     */
    public function create(JournalCreateDto $journalDto, Attacker $attacker, Victim $victim): Journal
    {
        $journal = new Journal();
        $journal->detection_date = $journalDto->detection_date;
        $journal->zav_sector_notice_date = $journalDto->zav_sector_notice_date;
        $journal->group_notice_date = $journalDto->group_notice_date;
        $journal->attacker_id = $attacker->id;
        $journal->victim_id = $victim->id;
        $journal->is_closed = false;
        $journal->save();

        return $journal;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return Journal::all();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): Journal
    {
        return Journal::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(JournalUpdateDto $journalDto): Journal
    {
        $journal = Journal::findOrFail($journalDto->id);

        foreach ($journalDto->toArray() as $key => $value) {
            if ($journal->$key instanceof Model) {
                continue;
            }

            $journal->$key = $value;
        }

        $journal->save();

        return $journal;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        return (bool) Journal::find($id)->delete();
    }
}
