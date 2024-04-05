<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Szamla;
use App\Models\Penzmozgas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Szamla::factory(30)->create();
        Penzmozgas::factory(200)->create();

       
    }
}
