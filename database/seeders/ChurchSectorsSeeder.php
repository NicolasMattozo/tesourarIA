<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChurchSectorsSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('church_sectors')->insert([
            [
                'id' => 1,
                'name'=> 'Setor 1',
                'description'=> 'Descrição do Setor 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name'=> 'Setor 2',
                'description'=> 'Descrição do Setor 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name'=> 'Setor 3',
                'description'=> 'Descrição do Setor 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name'=> 'Setor 4',
                'description'=> 'Descrição do Setor 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name'=> 'Setor 5',
                'description'=> 'Descrição do Setor 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name'=> 'Setor 6',
                'description'=> 'Descrição do Setor 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name'=> 'Setor 7',
                'description'=> 'Descrição do Setor 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
