<?php

namespace Database\Seeders;

use App\Models\Detente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detente::factory(10)->create();
    }
}
