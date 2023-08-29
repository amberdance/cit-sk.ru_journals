<?php

namespace App\Repository;

use App\Models\Journal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface JournalRepository
{
    /**
     * @param  array  $data
     *
     * @return Journal
     */
    function create(array $data): Journal;

    /**
     * @param  array  $filter
     *
     * @return AnonymousResourceCollection
     */
    function findAll(array $filter = []): AnonymousResourceCollection;

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
