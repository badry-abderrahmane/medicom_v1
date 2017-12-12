<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->string('phone')->nullable()->default('Non spécifié');
          $table->string('adress')->nullable()->default('Non spécifiée');
          $table->string('activite')->nullable()->default('Non spécifiée');
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
        Schema::dropIfExists('prospects');
    }
}
