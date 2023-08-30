<?php

namespace App\Dto\Attacker;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class AttackerDto extends ValidatedDTO {

    public string $ipv4;
    public string $type;
    public string $description;
    public string $country;

    protected function rules(): array {
        return [
                'ipv4'        => ['required', 'ipv4'],
                'type'        => ['required', 'string'],
                'description' => ['required', 'string'],
                'country'     => ['required', 'string'],
        ];

    }

    protected function defaults(): array {
        return [];
    }

    protected function casts(): array {
        return [];
    }

}
