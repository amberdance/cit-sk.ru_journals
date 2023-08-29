<?php

namespace App\Repository;

use App\Models\Attacker;

class AttackerRepositoryImpl implements AttackerRepository
{

    /**
     * @inheritDoc
     */
    function create(array $data): Attacker
    {
        $attacker = new Attacker();
        $attacker->ipv4 = $data["ipv4"];
        $attacker->type = $data["type"];
        $attacker->description = $data["description"];
        $attacker->country = $data["country"];
        $attacker->save();

        return $attacker;
    }
}
