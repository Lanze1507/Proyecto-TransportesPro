<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pilotos', function (Blueprint $table) {

            if (!Schema::hasColumn('pilotos', 'estado')) {
                $table->string('estado')
                    ->default('activo')
                    ->after('dpi');
            }

        });
    }

    public function down(): void
    {
        Schema::table('pilotos', function (Blueprint $table) {

            $table->dropColumn('estado');

        });
    }
};