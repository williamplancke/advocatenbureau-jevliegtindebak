<?php

namespace Database\Seeders;

use App\Models\Lawyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lawyer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lawyer::factory()->count(5)->create();
    }
}
