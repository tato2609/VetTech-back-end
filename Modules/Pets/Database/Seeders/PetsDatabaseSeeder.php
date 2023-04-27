<?php

namespace Modules\Pets\Database\Seeders;

use Modules\Pets\Models\Pets;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PetsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $pets = [
            [
                'name'          => 'Chiqui carolina',
                'age'           => '9',
                'race'          => 'Schnauzer',
                'species'       => 'Canino',
                'sex'           => 'F',
                'registered_by' => '1',
                'client_id'     => '2',
                'status'        => true,
            ],
            [
                'name'          => 'Alaska',
                'age'           => '5 meses',
                'race'          => 'Husky',
                'species'       => 'Canino',
                'sex'           => 'F',
                'registered_by' => '1',
                'client_id'     => '1',
                'status'        => true,
            ],

        ];

        foreach ($pets as $pet) {
            Pets::create($pet);
        }
    }
}
