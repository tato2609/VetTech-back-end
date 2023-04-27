<?php

namespace Modules\Races\Database\Seeders;

use Modules\Races\Models\Races;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class RacesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $races = [
        [
            'name'          => 'Schnauzer',
            'status'        => true,
        ],
        [
            'name'          => 'Husky',
            'status'        => true,
        ],
    ];

    foreach ($races as $race) {
        Races::create($race);
    }
    }
}
