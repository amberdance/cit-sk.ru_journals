<?php

namespace App\Dto;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class AttackerDto extends ValidatedDTO {

    public string $ipv4;
    public string $type;
    public string $description;
    public string $country;

    protected function rules(): array {
        return [
                'ipv4'        => ['required'],
                'type'        => ['required'],
                'description' => ['required'],
                'country'     => ['required'],
        ];

    }

    protected function defaults(): array {
        return [];
    }

    protected function casts(): array {
        return [];
    }

}
