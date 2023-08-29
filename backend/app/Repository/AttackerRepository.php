<?php

namespace App\Repository;

use App\Models\Attacker;

interface AttackerRepository
{
    /**
     * @param  array  $data
     *
     * @return Attacker
     */
    function create(array $data): Attacker;
}
