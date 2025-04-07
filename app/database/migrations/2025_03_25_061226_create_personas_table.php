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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_doc')->constrained('tipo_docs');
            $table->string('num_doc')->unique();
            $table->string('nombre_uno');
            $table->string('nombre_dos')->nullable();
            $table->string('apellido_uno');
            $table->string('apellido_dos')->nullable();
            $table->string('telefono')->unique();
            $table->foreignId('rol_id')->constrained('rols');
            $table->string('password')->nullable();
            $table->timestamps();
        });


        // Insertar un usuario administrador
        DB::table('personas')->insert([
            'tipo_doc' => 1, // ID del tipo de documento (por ejemplo, "Cédula de ciudadanía")
            'num_doc' => '123456789', // Número de documento del administrador
            'nombre_uno' => 'Admin',
            'nombre_dos' => null,
            'apellido_uno' => 'Principal',
            'apellido_dos' => null,
            'telefono' => '3001234567',
            'rol_id' => 1, // ID del rol "Administrador"
            'password' => bcrypt('admin123'), // Contraseña encriptada

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
