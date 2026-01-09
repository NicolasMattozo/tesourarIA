<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cashbox extends Model
{
    protected $fillable = [
        'name',
        'balance_cash',
        'balance_pix'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
