<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('totalHT')->nullable()->default('0');
            $table->string('totalTTC')->nullable()->default('0');
            $table->integer('prospect_id')->unsigned();
            $table->string('status')->default('1');
            $table->timestamps();

            $table->foreign('prospect_id')
                  ->references('id')->on('prospects')
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
        Schema::dropIfExists('devis');
    }
}
