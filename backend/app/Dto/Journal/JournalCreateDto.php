<?php

namespace App\Dto\Journal;

use App\Dto\Attacker\AttackerCreateDto;
use App\Dto\Victim\VictimCreateDto;
use DateTime;
use WendellAdriel\ValidatedDTO\Casting\CarbonCast;
use WendellAdriel\ValidatedDTO\Casting\DTOCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class JournalCreateDto extends ValidatedDTO
{
    public DateTime $detection_date;
    public DateTime $group_notice_date;
    public DateTime $zav_sector_notice_date;
    public AttackerCreateDto $attacker;
    public VictimCreateDto $victim;
    public bool $is_closed = false;


    protected function rules(): array
    {
        return [
            'detection_date'         => ['required', 'date'],
            'group_notice_date'      => ['required', 'date'],
            'zav_sector_notice_date' => ['required', 'date'],
            'attacker'               => ['required', 'array'],
            'victim'                 => ['required', 'array'],
            'is_closed'              => ['boolean'],
        ];
    }

    protected function casts(): array
    {
        return [
            "attacker"               => new DTOCast(AttackerCreateDto::class),
            "victim"                 => new DTOCast(VictimCreateDto::class),
            "detection_date"         => new CarbonCast(),
            "group_notice_date"      => new CarbonCast(),
            "zav_sector_notice_date" => new CarbonCast(),
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

}
