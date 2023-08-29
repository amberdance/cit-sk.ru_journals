<?php

namespace App\Http\Resources;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Journal */
class JournalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                     => $this->id,
            'detection_date'         => $this->detection_date,
            'group_notice_date'      => $this->group_notice_date,
            'zav_sector_notice_date' => $this->zav_sector_notice_date,
            'is_closed'              => $this->is_closed,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
