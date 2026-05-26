<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('camiones', function (Blueprint $table) {
            // Cambiar capacidad de string a decimal(10,2)
            $table->decimal('capacidad', 10, 2)->nullable()->change();

            // Agregar estado
            $table->string('estado', 20)->default('disponible')->after('capacidad');
        });
    }

    public function down(): void
    {
        Schema::table('camiones', function (Blueprint $table) {
            $table->string('capacidad')->change();
            $table->dropColumn('estado');
        });
    }
};