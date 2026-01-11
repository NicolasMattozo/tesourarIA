<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FinancialSectorSeeder::class);
        $this->call(PaymentMethodsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CashboxesSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(ChurchSectorsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
