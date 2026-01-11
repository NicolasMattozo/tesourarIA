<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'SuperIntendência',
                'description' => 'Liderança máxima com acesso total',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liderança',
                'description' => 'Líderes com permissões avançadas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tesouraria',
                'description' => 'Responsáveis pela gestão financeira',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Membros',
                'description' => 'Usuários comuns com acesso limitado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
