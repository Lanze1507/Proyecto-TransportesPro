<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega columna 'role' a notificaciones para saber
     * a qué rol va dirigida cada notificación (admin, operador, etc.)
     * y columna 'viaje_id' para vincular notificaciones a viajes específicos.
     */
    public function up(): void
    {
        Schema::table('notificaciones', function (Blueprint $table) {

            // A qué rol va dirigida la notificación
            $table->string('role')->default('admin')->after('leida');

            // Opcional: vincular a un viaje específico
            $table->unsignedBigInteger('viaje_id')->nullable()->after('role');
            $table->foreign('viaje_id')
                ->references('id')
                ->on('viajes')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->dropForeign(['viaje_id']);
            $table->dropColumn(['role', 'viaje_id']);
        });
    }
};