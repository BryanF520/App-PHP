<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_docs', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_doc');
            $table->timestamps();
        });

        DB::table('tipo_docs')->insert([
            ['tipo_doc' => 'Cédula de ciudadanía'],
            ['tipo_doc' => 'Tarjeta de identidad'],
            ['tipo_doc' => 'Cédula de extranjería'],
            ['tipo_doc' => 'Pasaporte']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_docs');
    }
};
