<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int     $id
 * @property Journal $journal
 * @property string  $ipv4
 * @property string  $owner
 */
class Victim extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [];

    public function journal(): HasOne
    {
        return $this->hasOne(Journal::class);
    }
}
