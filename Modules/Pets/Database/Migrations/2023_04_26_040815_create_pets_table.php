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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            # En: Name of client
            # Es: Nombre del cliente
            $table->string('name')
                ->comment('Nombre del cliente');

            # En: Adge of pets
            # Es: Edad de la mascota
            $table->string('age')
                ->comment('Edad de la mascota');

            # En: Pet owner
            # Es: Dueño de la mascota Relacion con la tabla clientes
            $table->foreignId('client_id')->constrained('clients')->nullable();
            $table->timestamps();

            # En: Status field
            # Es: Campo de estado
            $table->boolean('status')
                ->comment('Campo de estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
