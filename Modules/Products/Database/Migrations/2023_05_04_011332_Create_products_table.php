<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            # En: Code of product
            # Es: Codigo del producto
            $table->string('code')
                ->comment('Codigo del producto');

            # En: Name of product
            # Es: Nombre del producto
            $table->string('name')
                ->comment('Nombre del producto');

            # En: Description of product
            # Es: Descripcion del producto
            $table->string('description')
                ->comment('Descripcion del producto');

            # En: Name of manufacturer
            # Es: Nombre de empresa fabricante
            $table->string('manufacturer')
                ->comment('Nombre de empresa fabricante');

            # En: Quantity of products
            # Es: Cantidad del producto
            $table->string('quantity')
                ->comment('Cantidad del producto');

             # En: Product Registered by 
            # Es: producto registrado por
            $table->string('registered_by')
                ->comment('registrado por');

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
