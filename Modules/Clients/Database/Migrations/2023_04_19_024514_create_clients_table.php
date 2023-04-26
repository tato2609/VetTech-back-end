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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            # En: Name of client
            # Es: Nombre del cliente
            $table->string('name')
                ->comment('Nombre del cliente');

            # En: last name of client
            # Es: Apellido del cliente
            $table->string('last_name')
                ->comment('Apellido del cliente');

            # En: Cellphone of client
            # Es: Telefono del cliente
            $table->string('cellphone')
                ->comment('Celular del cliente');

            # En: Address of client
            # Es: Direccion del cliente
            $table->string('address')
                ->comment('Direccion del cliente');

            # En: email of client
            # Es: Correo  del cliente
            $table->string('email')
                ->comment('Correo electronico del cliente');

            # En: Status field
            # Es: Campo de estado
            $table->boolean('status')
            ->comment('Campo de estado');

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
        Schema::dropIfExists('courses');
    }
};
