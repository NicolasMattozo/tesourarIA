<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialSectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('financial_sectors')->insert([
            [
                'name' => 'Cantina',
                'description' => 'Controle financeiro da cantina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Compras de Insumos',
                'description' => 'Gestão de insumos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Compras',
                'description' => 'Aquisição de bens e serviços',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Custeio de Cantores e/ou Pregadores',
                'description' => 'Despesas com cantores e pregadores',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Locomoções e Deslocamentos',
                'description' => 'Despesas com transporte e deslocamento',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
