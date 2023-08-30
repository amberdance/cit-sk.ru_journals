<?php

namespace App\Repository;

use App\Dto\Attacker\AttackerDto;
use App\Models\Attacker;

interface AttackerRepository
{
    /**
     * @param  \App\Dto\Attacker\AttackerDto  $attackerDto
     *
     * @return Attacker
     */
    function create(AttackerDto $attackerDto): Attacker;
}
