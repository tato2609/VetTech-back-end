<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Pets\Database\Seeders\PetsDatabaseSeeder;
use Modules\Clients\Database\Seeders\ClientsDatabaseSeeder;
use Modules\Products\Database\Seeders\ProductsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClientsDatabaseSeeder::class,
            PetsDatabaseSeeder::class,
            ProductsDatabaseSeeder::class
        ]);
    }
}
