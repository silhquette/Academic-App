<?php

namespace Database\Seeders;

use App\Models\ElectiveSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectiveSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ElectiveSubject::factory(16)->create();
    }
}
