<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attacker extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [];


//    public function journal(): HasOne
//    {
//        return $this->hasOne(Journal::class);
//    }
}
