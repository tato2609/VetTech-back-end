<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Products\Models\Products;

class ProductsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $products = [
            [
                'code'          => 'X59',
                'name'          => 'Comida para perro',
                'description'   => 'Paquete por 500gr',
                'manufacturer'  => 'Purina',
                'quantity'      => '50',
                'registered_by' => 'Javier Esquivia',
               
            ],
            [
                'code'          => 'X60',
                'name'          => 'Comida para Gato',
                'description'   => 'Paquete por 250gr',
                'manufacturer'  => 'Purina',
                'quantity'      => '50',
                'registered_by' => 'Javier Esquivia',
            ],

        ];

        foreach ($products as $product) {
            Products::create($product);
        }

        // $this->call("OthersTableSeeder");
    }
}
