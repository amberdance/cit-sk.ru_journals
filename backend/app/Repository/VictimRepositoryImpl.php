<?php

namespace App\Repository;

use App\Models\Victim;

class VictimRepositoryImpl implements VictimRepository
{

    /**
     * @inheritDoc
     */
    function create(array $data): Victim
    {
        $victim = new Victim();
        $victim->ipv4 = $data["ipv4"];
        $victim->owner = $data["owner"];
        $victim->save();

        return $victim;
    }
}
