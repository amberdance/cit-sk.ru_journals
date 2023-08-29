<?php

namespace App\Repository;

use App\Models\Victim;

interface VictimRepository
{
    /**
     * @param  array  $data
     *
     * @return Victim
     */
    function create(array $data): Victim;
}
