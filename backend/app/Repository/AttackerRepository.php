<?php

namespace App\Repository;

use App\Dto\Attacker\AttackerCreateDto;
use App\Dto\Attacker\AttackerUpdateDto;
use App\Models\Attacker;

interface AttackerRepository
{
    /**
     * @param  AttackerCreateDto  $attackerDto
     *
     * @return Attacker
     */
    function create(AttackerCreateDto $attackerDto): Attacker;

    /**
     * @param  AttackerUpdateDto  $attackerDto
     *
     * @return mixed
     */
    function update(AttackerUpdateDto $attackerDto): Attacker;
}
