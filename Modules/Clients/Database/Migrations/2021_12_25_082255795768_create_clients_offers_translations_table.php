<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsOffersTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients__offers_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('offers_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['offers_id', 'locale']);
            $table->foreign('offers_id')->references('id')->on('clients__offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients__offers_translations', function (Blueprint $table) {
            $table->dropForeign(['offers_id']);
        });
        Schema::dropIfExists('clients__offers_translations');
    }
}
