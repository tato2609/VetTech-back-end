<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Clients\Models\Clients;
use Illuminate\Database\Eloquent\Model;

class ClientsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name'      => 'Robinson',
                'last_name' => 'Horta',
                'cellphone' => '3184787109',
                'address'   => 'Cra 42 B# 114-31',
                'email'     => 'hortarobinson@gmail.com',
                'status'    => true,
            ],
            [
                'name'      => 'Nactali',
                'last_name' => 'Rios',
                'cellphone' => '3043985610',
                'address'   => 'Cra 42 B# 114-31',
                'email'     => 'nacta.rios@gmail.com',
                'status'    => true,
            ],

        ];

        foreach ($clients as $clients) {
            Clients::create($clients);
        }
    }
}
