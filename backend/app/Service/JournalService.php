<?php

namespace App\Service;

use App\Dto\JournalRequestDto;
use App\Http\Resources\JournalCollection;
use App\Http\Resources\JournalResource;


interface JournalService {
    /**
     * @param  JournalRequestDto  $journalRequestDto
     *
     * @return JournalResource
     */
    function create(JournalRequestDto $journalRequestDto): JournalResource;

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
