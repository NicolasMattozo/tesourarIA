<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'type',
        'start_date',
        'end_date'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function paymentPlans()
    {
        return $this->hasMany(PaymentPlan::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}

