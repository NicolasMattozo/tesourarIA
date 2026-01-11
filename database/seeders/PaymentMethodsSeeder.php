<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('payment_methods')->insert([
           ['name' => 'Dinheiro'],
           ['name' => 'Cartão de Crédito'],
           ['name' => 'Cartão de Débito'],
           ['name' => 'Pix'],
           ['name' => 'Transferência Bancária'],
           ['name' => 'Cheque'],
           ['name' => 'Boleto Bancário'],
       ]);
    }
}
