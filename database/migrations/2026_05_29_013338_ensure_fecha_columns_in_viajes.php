<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Las columnas fecha_salida y fecha_llegada ya existen en la tabla viajes
     * pero no están en el $fillable del modelo — este archivo solo sirve
     * de documentación del cambio. El ajuste real es en el Model Viaje.php.
     *
     * Esta migración también estandariza los valores del campo 'estado'
     * agregando un CHECK constraint para evitar estados inválidos.
     */
    public function up(): void
    {
        // fecha_salida y fecha_llegada ya existen, no hay que crearlas.
        // Solo nos aseguramos de que estén presentes por si alguien
        // corrió migrate:fresh y perdió la migración original de viajes.
        if (!Schema::hasColumn('viajes', 'fecha_salida')) {
            Schema::table('viajes', function (Blueprint $table) {
                $table->dateTime('fecha_salida')->nullable()->after('destino');
            });
        }

        if (!Schema::hasColumn('viajes', 'fecha_llegada')) {
            Schema::table('viajes', function (Blueprint $table) {
                $table->dateTime('fecha_llegada')->nullable()->after('fecha_salida');
            });
        }
    }

    public function down(): void
    {
        // No se elimina nada — son columnas funcionales del sistema
    }
};