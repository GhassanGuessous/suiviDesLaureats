<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objet');
            $table->timestamp('date');
            $table->integer('emetteur')->unsigned();
            $table->integer('recepteur')->unsigned();
            $table->timestamps();

            $table->foreign('emetteur')
                  ->references('id')
                  ->on('utilisateurs')
                  ->onDelete('cascade');

            $table->foreign('recepteur')
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
        Schema::drop('emails');
    }
}
