<?php

namespace App\Services;

use App\Models\Cashbox;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class TransactionService
{
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            $cashbox = Cashbox::findOrFail($data['cashbox_id']);
            $paymentMethod = PaymentMethod::findOrFail($data['payment_method_id']);

            $type = $data['type'];
            $amount = $data['amount'];
            $this->validateBalance($cashbox, $paymentMethod, $type, $amount);
            $this->updateCashboxBalance($cashbox, $paymentMethod, $type, $amount);

            return Transaction::create($data);
        });
    }

    private function validateBalance(Cashbox $cashbox, PaymentMethod $method, string $type, float $amount)
    {
        if ($type !== 'expense') return;

        if ($method->name === 'Pix' && $cashbox->balance_pix < $amount) {
            throw ValidationException::withMessages([
                'amount' => 'Saldo insuficiente no Pix.',
            ]);
        }


        if ($method->name === 'Dinheiro' && $cashbox->balance_cash < $amount) {
            throw ValidationException::withMessages([
                'amount' => 'Saldo insuficiente no Dinheiro.',
            ]);
        }
    }

    private function updateCashboxBalance(Cashbox $cashbox, PaymentMethod $method, string $type, float $amount)
    {

        if ($method->name === 'Pix') {
            $cashbox->balance_pix += ($type === 'income' ? $amount : -$amount);
        }

        if ($method->name === 'Dinheiro') {
            $cashbox->balance_cash += ($type === 'income' ? $amount : -$amount);
        }

        $cashbox->save();
    }

    public function transfer(array $data)
    {
        return DB::transaction(function () use ($data) {

            $groupId = Str::uuid();

            // Saída
            $this->create([
                ...$data,
                'type' => 'expense',
                'cashbox_id' => $data['from_cashbox_id'],
                'transfer_group_id' => $groupId,
            ]);

            // Entrada
            $this->create([
                ...$data,
                'type' => 'income',
                'cashbox_id' => $data['to_cashbox_id'],
                'transfer_group_id' => $groupId,
            ]);

            return true;
        });
    }
}

