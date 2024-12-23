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
        Schema::create('students', function (Blueprint $table) {
            $table->id()->comment(' Identificador único.');
            $table->string('first_name', 50)->comment('Nombre del estudiante (string, máximo 50 caracteres).');
            $table->string('last_name', 50)->comment('Apellido del estudiante (string, máximo 50 caracteres).');
            $table->string('email')->comment(' Correo electrónico único ');
            $table->string('phone',9)->comment(' Número de teléfono, numero de telefonos validos para Perú');
            $table->date('birth_date')->comment(' Fecha de nacimiento (date)');
            $table->timestamp('enrollment_date',3)->useCurrent()->comment(' Fecha de inscripción  con precion en milisegundos');
            $table->foreignId('user_id')->constrained('users')->comment('Creando forign Key de la relacion con Usuarios');
            $table->boolean('status')->default(true)->comment('Estado del estudiante (Activo, Inactivo)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
