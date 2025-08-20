<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscription;

class InscriptionsSeeder extends Seeder
{
    public function run(): void
    {
        Inscription::factory()->count(30)->create();
    }
}
