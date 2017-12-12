<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bondecommandes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('fournisseur_id')->unsigned();
          $table->timestamps();

          $table->foreign('fournisseur_id')
                ->references('id')->on('fournisseurs')
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
        Schema::dropIfExists('bondecommandes');
    }
}
