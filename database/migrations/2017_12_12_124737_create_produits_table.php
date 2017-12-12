<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('reference')->unique();
            $table->string('delaisLivraison')->nullable()->default('0');
            $table->string('prixFournisseur')->nullable()->default('0');
            $table->string('prixVente')->nullable()->default('0');
            $table->string('quantiteMin')->nullable()->default('0');
            $table->string('quantiteMax')->nullable()->default('0');
            $table->string('note')->nullable()->default('Rien à signaler.');
            $table->string('img')->nullable()->default('');
            $table->integer('category_id')->unsigned();
            $table->integer('fournisseur_id')->unsigned();

            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('produits');
    }
}
