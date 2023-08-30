<?php

namespace App\Dto\Attacker;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class AttackerUpdateDto extends ValidatedDTO
{

    public int $id;
    public ?string $ipv4 = null;
    public ?string $type = null;
    public ?string $description = null;
    public ?string $country = null;

    protected function rules(): array
    {
        return [
            'id'          => ['required', 'integer'],
            'ipv4'        => ['ipv4'],
            'type'        => ['string'],
            'description' => ['string'],
            'country'     => ['string'],
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
