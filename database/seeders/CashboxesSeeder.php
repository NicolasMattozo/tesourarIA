<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashboxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cashboxes')->insert([
            [
                'name' => 'Caixa Geral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Caixa Cantina',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
