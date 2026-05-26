<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();                                   // PK

            // FK → entregas.id
            // CASCADE: si se borra la entrega, se borran sus fotos
            $table->unsignedBigInteger('entrega_id')->nullable();
            $table->foreign('entrega_id')
                ->references('id')->on('entregas')
                ->cascadeOnDelete();

            $table->string('foto_url', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};