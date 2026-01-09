<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'description',
        'amount',
        'financial_sector_id',
        'payment_method_id',
        'cashbox_id',
        'user_id',
        'event_id'
    ];

    public function financialSector()
    {
        return $this->belongsTo(FinancialSector::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function cashbox()
    {
        return $this->belongsTo(Cashbox::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
}

