<?php

namespace App\Service;

use App\Dto\JournalDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;


interface JournalService {
    /**
     * @param  JournalDto  $journalRequestDto
     *
     * @return JournalResource
     */
    function create(JournalDto $journalRequestDto): JournalResource;

    /**
     * @return JournalCollection
     */
    function findAll(): JournalCollection;

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    function delete(int $id);

}
