<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->hasMany(BoardingRoom::class, 'boarding_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
