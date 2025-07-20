<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hospital;
use App\Models\News;
use App\Models\Drug;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
        Hospital::factory(100)->create();
        News::factory(100)->create();
        Drug::factory(100)->create();
       
    }
}
