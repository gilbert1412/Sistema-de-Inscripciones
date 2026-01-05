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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumnos_id')
            ->constrained(table: 'alumnos', indexName: 'inscripciones_alumnos_id')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('talleres_id')
            ->constrained(table: 'talleres', indexName: 'inscripciones_talleres_id')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
