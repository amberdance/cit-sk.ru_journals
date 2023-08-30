<?php

namespace App\Repository;

use App\Dto\Attacker\AttackerCreateDto;
use App\Models\Attacker;

interface AttackerRepository
{
    /**
     * @param  AttackerCreateDto  $attackerDto
     *
     * @return Attacker
     */
    function create(AttackerCreateDto $attackerDto): Attacker;
}
