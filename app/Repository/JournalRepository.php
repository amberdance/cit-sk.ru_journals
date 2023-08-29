<?php

namespace App\Repository;

use App\Http\Requests\JournalRequest;
use App\JournalCollection;
use App\Models\Journal;

interface JournalRepository
{
    /**
     * @param  JournalRequest  $journalRequest
     *
     * @return Journal
     */
    function create(JournalRequest $journalRequest): Journal;

    /**
     * @param  array  $filter
     *
     * @return JournalCollection
     */
    function findAll(array $filter = []): JournalCollection;

    /**
     * @param  int  $id
     *
     * @return Journal
     */
    function findById(int $id): Journal;

    /**
     * @param  JournalRequest  $journalRequest
     *
     * @return Journal
     */
    function update(JournalRequest $journalRequest): Journal;

    /**
     * @param  int  $id
     *
     * @return bool
     */
    function delete(int $id): bool;
}
