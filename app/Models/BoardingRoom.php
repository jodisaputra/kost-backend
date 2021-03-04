<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardingRoom extends Model
{
    protected $guarded = [];

    public function boarding_house()
    {
        return $this->belongsTo(BoardingHouse::class, 'id');
    }
}
