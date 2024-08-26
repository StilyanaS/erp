<?php

//namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Estudiante';

    /**
     * Run the migrations.
     * @table Estudiante
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('Nombre', 45)->nullable();
            $table->string('Apellido', 45)->nullable();
            $table->date('Fecha_Nacimiento')->nullable();
            $table->string('Genero', 10)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Telefono_Contacto', 20)->nullable();
            $table->string('Correo_Electronico', 200)->nullable();
            $table->string('Informacion_Medica', 200)->nullable();
            $table->date('Fecha_Ingreso')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unique(["id"], 'ID_Estudiante_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
