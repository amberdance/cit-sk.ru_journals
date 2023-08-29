<?php

namespace App\Repository;

use App\Http\Resources\JournalCollection;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;

interface JournalRepository
{
    /**
     * @param  array     $data
     * @param  Attacker  $attacker
     * @param  Victim    $victim
     *
     * @return Journal
     */
    function create(array $data, Attacker $attacker, Victim $victim): Journal;

    /**
     * @return JournalCollection
     */
    function findAll(): JournalCollection;

    /**
     * @param  int  $id
     *
     * @return Journal
     */
    function findById(int $id): Journal;

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
