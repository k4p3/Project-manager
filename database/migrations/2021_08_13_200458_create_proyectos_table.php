<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('clave');
            $table->text('descripcion');
            $table->date('limite');
            $table->integer('presupuesto');
            $table->integer('pasignado')->nullable();
            $table->text('documento');
            $table->integer("area_id")->unsigned();
            $table->integer("rubro_id")->unsigned();
            $table->integer("estatus_id")->unsigned();
            $table->integer("user_id")->unsigned();

            $table->foreign("estatus_id")->references("id")->on("estatus")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("rubro_id")->references("id")->on("rubros")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("area_id")->references("id")->on("areas")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("user_id")->references("id")->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");

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
        Schema::dropIfExists('proyectos');
    }
}
