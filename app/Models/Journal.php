<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'detection_date'         => 'datetime',
        'group_notice_date'      => 'datetime',
        'zav_sector_notice_date' => 'datetime',
    ];

    protected $attributes = [
        "is_closed" => false
    ];

    protected function attacker(): HasOne
    {
        return $this->hasOne(Attacker::class);
    }

    protected function victim(): HasOne
    {
        return $this->hasOne(Victim::class);
    }
}
