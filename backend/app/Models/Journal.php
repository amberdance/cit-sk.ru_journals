<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @property int      $id
 * @property int      $attacker_id
 * @property int      $victim_id
 * @property Datetime $detection_date
 * @property Datetime $group_notice_date
 * @property Datetime $zav_sector_notice_date
 * @property boolean  $is_closed
 */
class Journal extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $hidden = [
        "deleted_at"
    ];

    protected $casts = [
        'detection_date'         => 'datetime',
        'group_notice_date'      => 'datetime',
        'zav_sector_notice_date' => 'datetime',
        "is_closed"              => "boolean"
    ];

    protected $attributes = [
        "is_closed" => false
    ];

    protected $with = ['attacker', 'victim'];

    public function attacker(): HasOne
    {
        return $this->hasOne(Attacker::class, "id", "attacker_id");
    }

    public function victim(): HasOne
    {
        return $this->hasOne(Victim::class, "id", "victim_id");
    }
}
