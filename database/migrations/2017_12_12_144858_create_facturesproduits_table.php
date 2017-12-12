<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturesproduits', function (Blueprint $table) {
          $table->increments('id');
          $table->string('quantite');
          $table->string('prixHT');
          $table->string('totalHT');
          $table->integer('produit_id')->unsigned();
          $table->integer('facture_id')->unsigned();
          $table->timestamps();
          
          $table->foreign('produit_id')
                ->references('id')->on('produits')
                  ->onDelete('cascade');
          $table->foreign('facture_id')
                ->references('id')->on('factures')
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
        Schema::dropIfExists('facturesproduits');
    }
}
