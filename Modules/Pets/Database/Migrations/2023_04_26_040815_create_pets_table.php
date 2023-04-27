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

            # En: Pet age
            # Es: Edad de la mascota
            $table->string('age')
                ->comment('Edad de la mascota');

            # En: Pet breed
            # Es: Raza de la mascota
            $table->string('race')
                ->comment('Raza de la mascota');

            # En: Animal species
            # Es: Especie del animal
            $table->string('species')
                ->comment('Edad de la mascota');

            # En: Pet sex
            # Es: Sexo de la mascota
            $table->string('sex')
                ->comment('Sexo de la mascota');

            # En: Registered by
            # Es: Quien registra
            $table->string('registered_by')
                ->comment('Edad de la mascota');
            //foreignId('user_id')->constrained('users')->nullable();

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
