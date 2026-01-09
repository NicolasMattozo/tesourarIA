<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'total_amount',
        'installments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function installments()
    {
        return $this->hasMany(PaymentInstallment::class);
    }
}
