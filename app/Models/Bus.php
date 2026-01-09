<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'event_id',
        'capacity',
        'price'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function passengers()
    {
        return $this->hasMany(BusPassenger::class);
    }
}
