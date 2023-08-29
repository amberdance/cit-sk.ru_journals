<?php

namespace App\Service;

use App\Http\Resources\JournalResource;

interface JournalService
{
    /**
     * @param  array  $data
     *
     * @return JournalResource
     */
    function create(array $data): JournalResource;

}
