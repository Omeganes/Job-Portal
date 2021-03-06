<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Resume;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ImageSeeder::class,
            UserSeeder::class,
            JobSeeder::class,
            ResumeSeeder::class,
        ]);
    }
}
