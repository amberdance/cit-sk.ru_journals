<?php

namespace App\Dto;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class VictimDto extends ValidatedDTO {

    public string $ipv4;
    public string $owner;

    protected function rules(): array {
        return [
                'ipv4'  => ['required', 'ipv4'],
                'owner' => ['required', 'string'],
        ];
    }

    protected function defaults(): array {
        return [];
    }

    protected function casts(): array {
        return [];
    }

}
