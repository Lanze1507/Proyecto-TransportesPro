<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pilotos', function (Blueprint $table) {
            // Agregar licencia NOT NULL después de nombre
            $table->string('licencia', 50)->after('nombre');

            // Agregar estado con valor por defecto
            $table->string('estado', 20)->default('activo')->after('telefono');

            // Eliminar dpi que no existe en la DB real
            $table->dropColumn('dpi');
        });
    }

    public function down(): void
    {
        Schema::table('pilotos', function (Blueprint $table) {
            $table->dropColumn(['licencia', 'estado']);
            $table->string('dpi')->nullable();
        });
    }
};
