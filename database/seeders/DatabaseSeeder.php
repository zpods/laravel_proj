<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GeneralSeeder;
use Database\Seeders\ImageSeeder;

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

            GeneralSeeder::class,
            ImageSeeder::class,

        ]);
    }
}
