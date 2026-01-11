<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'Congresso Geral',
                'type' => 'Evento anual para membros e convidados',
                'start_date' => '2026-09-01',
                'end_date' => '2026-09-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Retiro',
                'type' => 'Retiro de fim de semana para reflexão e crescimento espiritual',
                'start_date' => '2026-12-01',
                'end_date' => '2026-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Culto geral mensal',
                'type' => 'Culto especial realizado todo mês para a congregação',
                'start_date' => '2026-01-01',
                'end_date' => '2026-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lavacar',
                'type' => 'Evento de arrecadação de fundos através de lavagem de carros',
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Almoço beneficente',
                'type' => 'Almoço especial para arrecadação de fundos para projetos sociais',
                'start_date' => '2024-11-15',
                'end_date' => '2024-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acampamento de jovens',
                'type' => 'Acampamento anual para jovens da igreja',
                'start_date' => '2026-02-01',
                'end_date' => '2026-02-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Palestra namoro cristão',
                'type' => 'Palestra sobre relacionamentos e namoro segundo os princípios cristãos',
                'start_date' => '2026-06-01',
                'end_date' => '2026-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Conferência Jovem',
                'type' => 'Conferência anual para jovens com palestras e atividades',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
