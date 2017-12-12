<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondecommandesproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bondecommandesproduits', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('produit_id')->unsigned();
          $table->integer('bondecommande_id')->unsigned();
          $table->timestamps();

          $table->foreign('produit_id')
                ->references('id')->on('produits')
                  ->onDelete('cascade');
          $table->foreign('bondecommande_id')
                ->references('id')->on('bondecommandes')
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
        Schema::dropIfExists('bondecommandesproduits');
    }
}
