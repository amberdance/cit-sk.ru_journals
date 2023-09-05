<?php

namespace App\Repository;

use App\Dto\Journal\JournalCreateDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Models\Attacker;
use App\Models\Journal;
use App\Models\Victim;
use Illuminate\Database\Eloquent\Collection;

interface JournalRepository
{

    /**
     * @return Collection
     */
    function findAll(): Collection;

    /**
     * @param  int  $id
     *
     * @return Journal
     */
    function findById(int $id): Journal;

    /**
     * @param  JournalCreateDto  $journalDto
     * @param  Attacker          $attacker
     * @param  Victim            $victim
     *
     * @return Journal
     */
    function create(JournalCreateDto $journalDto, Attacker $attacker, Victim $victim): Journal;

    /**
     * @param  JournalUpdateDto  $journalDto
     * @param  Attacker|null     $attacker
     * @param  Victim|null       $victim
     *
     * @return Journal
     */
    function update(JournalUpdateDto $journalDto, ?Attacker $attacker, ?Victim $victim): Journal;

    /**
     * @param  int  $id
     *
     * @return bool
     */
    function delete(int $id): bool;
}
