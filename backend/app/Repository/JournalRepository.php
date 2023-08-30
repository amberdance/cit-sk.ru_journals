<?php

namespace App\Repository;

use App\Dto\JournalDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;

interface JournalRepository {
    /**
     * @param  JournalDto  $journalRequestDto
     * @param  Attacker    $attacker
     * @param  Victim      $victim
     *
     * @return Journal
     */
    function create(JournalDto $journalRequestDto, Attacker $attacker, Victim $victim): Journal;

    /**
     * @return JournalCollection
     */
    function findAll(): JournalCollection;

    /**
     * @param  int  $id
     *
     * @return JournalResource
     */
    function findById(int $id): JournalResource;

    /**
     * @param  array  $data
     *
     * @return Journal
     */
    function update(array $data): Journal;

    /**
     * @param  int  $id
     *
     * @return bool
     */
    function delete(int $id): bool;
}
