<?php

namespace App\Dto\Victim;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class VictimUpdateDto extends ValidatedDTO
{

    public int $id;
    public ?string $ipv4 = null;
    public ?string $owner = null;

    protected function rules(): array
    {
        return [
            'id'    => ['required', 'integer'],
            'ipv4'  => ['ipv4'],
            'owner' => ['string'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [];
    }

}
