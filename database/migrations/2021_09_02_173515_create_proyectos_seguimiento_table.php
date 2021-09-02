<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_seguimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("proyectos_id")->unsigned();
            $table->integer("user_id")->unsigned();

            $table->foreign("proyectos_id")->references("id")->on("proyectos")
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
        Schema::dropIfExists('proyectos_seguimiento');
    }
}
