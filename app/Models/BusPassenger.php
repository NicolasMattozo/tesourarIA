<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusPassenger extends Model
{
    protected $fillable = [
        'bus_id',
        'user_id',
        'has_paid'
    ];

    protected $casts = [
        'has_paid' => 'boolean'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
