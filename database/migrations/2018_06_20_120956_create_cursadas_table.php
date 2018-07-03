<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursadas', function (Blueprint $table) {

            $table->increments('id');

            $table->enum('dia',
                [
                    'lunes',
                    'martes',
                    'miercoles',
                    'jueves',
                    'viernes',
                    'sabado'
                ]
            );

            $table->time('hora_inicio');

            $table->time('hora_fin');

            $table->integer('materia_id');

            $table->integer('aula_id')->unsigned();

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');

            $table->unique(['dia', 'hora_inicio', 'aula_id']);

            $table->timestamps();
        });
    
        // Habilita las foreign key constraints
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursadas');
    }
}
