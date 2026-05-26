<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();                                              // PK

            // FK → viajes.id | UNIQUE: 1 viaje = máximo 1 entrega
            // CASCADE: si se borra el viaje, se borra la entrega
            $table->unsignedBigInteger('viaje_id')->nullable()->unique();
            $table->foreign('viaje_id')
                ->references('id')->on('viajes')
                ->cascadeOnDelete();

            $table->string('estado', 20)->default('pendiente');
            $table->text('firma_digital')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};