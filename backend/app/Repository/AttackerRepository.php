<?php

namespace App\Repository;

use App\Dto\AttackerDto;
use App\Models\Attacker;

interface AttackerRepository
{
    /**
     * @param  AttackerDto  $attackerDto
     *
     * @return Attacker
     */
    function create(AttackerDto $attackerDto): Attacker;
}
