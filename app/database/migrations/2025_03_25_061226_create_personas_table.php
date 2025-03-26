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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_doc')->constrained('tipo_docs');
            $table->string('num_doc')->unique();
            $table->string('nombre_uno');
            $table->string('nombre_dos')->nullable();
            $table->string('apellido_uno');
            $table->string('apellido_dos')->nullable();
            $table->integer('edad');
            $table->date('fecha_nacimiento');
            $table->string('email')->unique();
            $table->foreignId('rol_id')->constrained('rols');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
