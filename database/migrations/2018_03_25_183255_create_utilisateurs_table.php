<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cne');
            $table->string('nom');
            $table->string('prenom');
            $table->timestamp('date_naissance');
            $table->string('email')->unique();
            $table->string('promo');
            $table->string('login');
            $table->string('password', 60);
            $table->integer('filiere_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('filiere_id')
                  ->references('id')
                  ->on('filieres')
                  ->onDelete('cascade');

            $table->foreign('status_id')
                  ->references('id')
                  ->on('status')
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
        Schema::drop('utilisateurs');
    }
}
