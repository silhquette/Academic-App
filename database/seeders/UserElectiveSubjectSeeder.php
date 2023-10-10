<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserElectiveSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserElectiveSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserElectiveSubject::factory(30)->create();
    }
}
