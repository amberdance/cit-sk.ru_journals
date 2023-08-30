<?php

namespace App\Repository;

use App\Dto\Victim\VictimCreateDto;
use App\Dto\Victim\VictimUpdateDto;
use App\Models\Victim;

interface VictimRepository
{
    /**
     * @param  VictimCreateDto  $victimDto
     *
     * @return Victim
     */
    function create(VictimCreateDto $victimDto): Victim;

    /**
     * @param  VictimUpdateDto  $victimDto
     *
     * @return mixed
     */
    function update(VictimUpdateDto $victimDto): Victim;
}
