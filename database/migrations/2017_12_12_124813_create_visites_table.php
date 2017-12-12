<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
          $table->increments('id');
          $table->string('date');
          $table->string('sujet');
          $table->string('type')->default('Faible');
          $table->string('status')->default('En attente');
          $table->string('note')->default('Rien à signaler');
          $table->integer('client_id')->unsigned();
          $table->timestamps();

          $table->foreign('client_id')
                ->references('id')->on('clients')
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
        Schema::dropIfExists('visites');
    }
}
