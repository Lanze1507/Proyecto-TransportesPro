<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('cotizaciones', function (Blueprint $table) {

        $table->id();

        $table->string('nombre');

        $table->string('email');

        $table->string('telefono');

        $table->string('tipo_carga');

        $table->string('ciudad_origen');

        $table->string('incoterm')->nullable();

        $table->decimal('peso', 10, 2);

        $table->decimal('alto', 10, 2)->nullable();

        $table->decimal('ancho', 10, 2)->nullable();

        $table->decimal('largo', 10, 2)->nullable();

        $table->decimal('precio_estimado', 10, 2);

        $table->string('estado')->default('pendiente');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
