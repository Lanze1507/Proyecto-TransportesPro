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
        Schema::create('viaje_historials', function (Blueprint $table) {

    $table->id();

    $table->bigInteger('viaje_id');

    $table->string('estado');

    $table->text('descripcion');

    $table->timestamps();

    $table->foreign('viaje_id')
        ->references('id')
        ->on('viajes')
        ->onDelete('cascade');

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viaje_historials');
    }
};