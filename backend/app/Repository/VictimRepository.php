<?php

namespace App\Repository;

use App\Dto\Victim\VictimCreateDto;
use App\Models\Victim;

interface VictimRepository
{
    /**
     * @param  VictimCreateDto  $victimDto
     *
     * @return Victim
     */
    function create(VictimCreateDto $victimDto): Victim;
}
