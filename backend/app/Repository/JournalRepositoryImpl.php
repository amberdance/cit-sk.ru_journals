<?php

namespace App\Repository;


use App\Dto\Journal\JournalDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;

class JournalRepositoryImpl implements JournalRepository {

    /**
     * @inheritDoc
     */
    public function create(JournalDto $journalRequestDto, Attacker $attacker, Victim $victim): Journal {
        $journal = new Journal();
        $journal->detection_date = $journalRequestDto->detection_date;
        $journal->zav_sector_notice_date = $journalRequestDto->zav_sector_notice_date;
        $journal->group_notice_date = $journalRequestDto->group_notice_date;
        $journal->attacker_id = $attacker->id;
        $journal->victim_id = $victim->id;
        $journal->is_closed = false;
        $journal->save();

        return $journal;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): JournalCollection {
        return new JournalCollection(Journal::all());
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): JournalResource {
        return new JournalResource(Journal::findOrFail($id));
    }

    /**
     * @inheritDoc
     */
    public function update(JournalUpdateDto $journalUpdateDto): JournalResource {
        $journal = Journal::findOrFail($journalUpdateDto->id);

        if ($journalUpdateDto->detection_date) {
            $journal->detection_date = $journalUpdateDto->detection_date;
        }

        if ($journalUpdateDto->group_notice_date) {
            $journal->group_notice_date = $journalUpdateDto->group_notice_date;
        }

        if ($journalUpdateDto->zav_sector_notice_date) {
            $journal->zav_sector_notice_date = $journalUpdateDto->zav_sector_notice_date;
        }

        if ($journalUpdateDto->group_notice_date) {
            $journal->group_notice_date = $journalUpdateDto->group_notice_date;
        }

        if ($journalUpdateDto->is_closed) {
            $journal->is_closed = $journalUpdateDto->is_closed;
        }

        $journal->save();

        return new JournalResource($journal);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool {
        return (bool) Journal::find($id)->delete();
    }
}
