<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInstallment extends Model
{
    protected $fillable = [
        'payment_plan_id',
        'amount',
        'due_date',
        'is_paid',
        'transaction_id'
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'due_date' => 'date'
    ];

    public function paymentPlan()
    {
        return $this->belongsTo(PaymentPlan::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
