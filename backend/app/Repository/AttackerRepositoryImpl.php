<?php

namespace App\Repository;

use App\Dto\Attacker\AttackerCreateDto;
use App\Dto\Attacker\AttackerUpdateDto;
use App\Models\Attacker;

class AttackerRepositoryImpl implements AttackerRepository
{

    /**
     * @inheritDoc
     */
    function create(AttackerCreateDto $attackerDto): Attacker
    {
        $attacker = new Attacker();
        $attacker->ipv4 = $attackerDto->ipv4;
        $attacker->type = $attackerDto->type;
        $attacker->description = $attackerDto->description;
        $attacker->country = $attackerDto->country;
        $attacker->save();

        return $attacker;
    }

    /**
     * @inheritDoc
     */
    function update(AttackerUpdateDto $attackerDto): Attacker
    {
        $attacker = Attacker::findOrFail($attackerDto->id);

        foreach ($attackerDto->toArray() as $key => $value) {
            $attacker->$key = $value;
        }

        $attacker->save();

        return $attacker;
    }
}
