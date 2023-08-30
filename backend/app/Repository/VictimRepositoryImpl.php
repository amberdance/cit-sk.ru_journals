<?php

namespace App\Repository;

use App\Dto\Victim\VictimCreateDto;
use App\Models\Victim;

class VictimRepositoryImpl implements VictimRepository {

    /**
     * @inheritDoc
     */
    function create(VictimCreateDto $victimDto): Victim
    {
        $victim = new Victim();
        $victim->ipv4 = $victimDto->ipv4;
        $victim->owner = $victimDto->owner;
        $victim->save();

        return $victim;
    }
}
