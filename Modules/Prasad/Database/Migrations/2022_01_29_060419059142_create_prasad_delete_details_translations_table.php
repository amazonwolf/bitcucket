<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrasadDelete_detailsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prasad__delete_details_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('delete_details_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['delete_details_id', 'locale']);
            $table->foreign('delete_details_id')->references('id')->on('prasad__delete_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prasad__delete_details_translations', function (Blueprint $table) {
            $table->dropForeign(['delete_details_id']);
        });
        Schema::dropIfExists('prasad__delete_details_translations');
    }
}
