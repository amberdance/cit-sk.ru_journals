<?php

namespace App\Repository;

use App\Http\Resources\JournalCollection;
use App\Models\Journal;

interface JournalRepository
{
    /**
     * @param  array  $data
     *
     * @return Journal
     */
    function create(array $data): Journal;

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
