<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int      $id
 * @property int      $attacker_id
 * @property int      $victim_id
 * @property Attacker $attacker
 * @property Victim   $victim
 * @property DateTime $detection_date
 * @property DateTime $group_notice_date
 * @property DateTime $zav_sector_notice_date
 * @property boolean  $is_closed
 */
class   Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        "deleted_at",
    ];

    protected $casts = [
        "is_closed" => "boolean",
    ];

    protected $fillable = [];
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
