<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsClientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients__client_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('client_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['client_id', 'locale']);
            $table->foreign('client_id')->references('id')->on('clients__clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients__client_translations', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('clients__client_translations');
    }
}
