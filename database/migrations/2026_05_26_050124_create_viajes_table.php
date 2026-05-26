<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id');                              // PK

            $table->string('codigo_guia')->unique()->nullable();      // UNIQUE KEY

            // FK → clientes.id (SET NULL si se borra el cliente)
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')
                ->references('id')->on('clientes')
                ->nullOnDelete();

            // FK → pilotos.id (SET NULL si se borra el piloto)
            $table->unsignedBigInteger('piloto_id')->nullable();
            $table->foreign('piloto_id')
                ->references('id')->on('pilotos')
                ->nullOnDelete();

            // FK → camiones.id (SET NULL si se borra el camión)
            $table->unsignedBigInteger('camion_id')->nullable();
            $table->foreign('camion_id')
                ->references('id')->on('camiones')
                ->nullOnDelete();

            $table->string('origen', 255);
            $table->string('destino', 255);
            $table->dateTime('fecha_salida')->nullable();
            $table->dateTime('fecha_llegada')->nullable();
            $table->string('estado', 20)->default('pendiente');

            // Coordenadas actuales del camión (tiempo real)
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();

            // Coordenadas fijas de origen y destino
            $table->decimal('lat_origen', 10, 8)->nullable();
            $table->decimal('lng_origen', 11, 8)->nullable();
            $table->decimal('lat_destino', 10, 8)->nullable();
            $table->decimal('lng_destino', 11, 8)->nullable();

            // Datos de entrega
            $table->string('firma_cliente')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->boolean('recibido')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};