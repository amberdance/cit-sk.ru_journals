<?php

namespace App\Repository;

use App\Dto\Victim\VictimDto;
use App\Models\Victim;

class VictimRepositoryImpl implements VictimRepository {

    /**
     * @inheritDoc
     */
    function create(VictimDto $victimDto): Victim {
        $victim = new Victim();
        $victim->ipv4 = $victimDto->ipv4;
        $victim->owner = $victimDto->owner;
        $victim->save();

        return $victim;
    }
}
