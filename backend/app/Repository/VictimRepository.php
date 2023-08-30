<?php

namespace App\Repository;

use App\Dto\Victim\VictimDto;
use App\Models\Victim;

interface VictimRepository
{
    /**
     * @param  VictimDto  $victimDto
     *
     * @return Victim
     */
    function create(VictimDto $victimDto): Victim;
}
