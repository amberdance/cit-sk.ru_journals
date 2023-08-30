<?php

namespace App\Service;

use App\Dto\Journal\JournalCreateDto;
use App\Dto\Journal\JournalUpdateDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;


interface JournalService {
    /**
     * @param  JournalCreateDto  $journalRequestDto
     *
     * @return JournalResource
     */
    function create(JournalCreateDto $journalRequestDto): JournalResource;

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
     * @param  int  $id
     *
     * @return bool
     */
    function delete(int $id): bool;

    /**
     * @param  JournalUpdateDto  $journalUpdateDto
     *
     * @return JournalResource
     */
    public function update(JournalUpdateDto $journalUpdateDto): JournalResource;

}
