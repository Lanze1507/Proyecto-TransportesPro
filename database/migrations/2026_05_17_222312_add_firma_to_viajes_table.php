<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('viajes', function (Blueprint $table) {

            $table->string('firma_cliente')
                ->nullable();

            $table->timestamp('fecha_entrega')
                ->nullable();

            $table->boolean('recibido')
                ->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('viajes', function (Blueprint $table) {

            $table->dropColumn([
                'firma_cliente',
                'fecha_entrega',
                'recibido'
            ]);

        });
    }
};