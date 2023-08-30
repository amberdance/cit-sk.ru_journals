<?php

namespace App\Repository;

use App\Dto\AttackerDto;
use App\Models\Attacker;

class AttackerRepositoryImpl implements AttackerRepository {

    /**
     * @inheritDoc
     */
    function create(AttackerDto $attackerDto): Attacker {
        $attacker = new Attacker();
        $attacker->ipv4 = $attackerDto->ipv4;
        $attacker->type = $attackerDto->type;
        $attacker->description = $attackerDto->description;
        $attacker->country = $attackerDto->country;
        $attacker->save();

        return $attacker;
    }
}
