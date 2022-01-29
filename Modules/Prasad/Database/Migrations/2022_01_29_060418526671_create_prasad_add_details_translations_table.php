<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrasadAdd_detailsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prasad__add_details_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('add_details_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['add_details_id', 'locale']);
            $table->foreign('add_details_id')->references('id')->on('prasad__add_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prasad__add_details_translations', function (Blueprint $table) {
            $table->dropForeign(['add_details_id']);
        });
        Schema::dropIfExists('prasad__add_details_translations');
    }
}
