<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name', 100)->nullable();//OPCIONAL - SEGUNDO NOMBRE
            $table->string('last_name_1');//PRIMER APELLIDO
            $table->string('last_name_2');//SEGUNDO APELLIDO
            $table->string('job_name');//PUESTO SOLICITADO
            $table->string('dept_name');//DEPARTAMENTO DONDE DESEMPEÑARÁ SUS LABORES
            $table->string('email');
            $table->string('phone');
            $table->string('status');
            $table->string('type_register');//Tipo de registro, distinción si se trata de una baja o una alta de personal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
