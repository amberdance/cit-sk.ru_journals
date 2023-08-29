<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int    $id
 * @property string $ipv4
 * @property string $type
 * @property string $description
 * @property string $country
 */
class Attacker extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [];


}
