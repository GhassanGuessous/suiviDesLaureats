<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('poste');
            $table->timestamp('date_debut');
            $table->integer('societe_id')->unsigned();
            $table->integer('utilisateur_id')->unsigned();
            $table->timestamps();

            $table->foreign('societe_id')
                  ->references('id')
                  ->on('societes')
                  ->onDelete('cascade');

            $table->foreign('utilisateur_id')
                  ->references('id')
                  ->on('utilisateurs')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emplois');
    }
}
