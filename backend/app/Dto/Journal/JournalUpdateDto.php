<?php

namespace App\Dto\Journal;

use App\Dto\Attacker\AttackerUpdateDto;
use App\Dto\Victim\VictimUpdateDto;
use DateTime;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;
use WendellAdriel\ValidatedDTO\Casting\DTOCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class JournalUpdateDto extends ValidatedDTO {

    public int $id;
    public ?DateTime $detection_date = null;
    public ?DateTime $group_notice_date = null;
    public ?DateTime $zav_sector_notice_date = null;
    public ?AttackerUpdateDto $attacker = null;
    public ?VictimUpdateDto $victim = null;
    public bool $is_closed = false;


    protected function rules(): array {
        return [
                'id'                     => ['required', 'integer'],
                'detection_date'         => ['date'],
                'group_notice_date'      => ['date'],
                'zav_sector_notice_date' => ['date'],
                'attacker'               => ['array'],
                'victim'                 => ['array'],
                'is_closed'              => ['boolean'],
        ];
    }

    protected function casts(): array {
        return [
                "attacker"               => new DTOCast(AttackerUpdateDto::class),
                "victim"                 => new DTOCast(VictimUpdateDto::class),
                "detection_date"         => new CarbonCast(),
                "group_notice_date"      => new CarbonCast(),
                "zav_sector_notice_date" => new CarbonCast(),
        ];
    }

    protected function defaults(): array {
        return [
                "is_closed" => false,
        ];
    }

}
