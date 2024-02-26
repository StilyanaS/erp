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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellidos");
            $table->date("fecha_nacimiento");
            $table->string("genero");
            $table->string("direccion");
            $table->string("telefono_contacto");
            $table->string("email");
            $table->string("rol");
            $table->date("start_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
