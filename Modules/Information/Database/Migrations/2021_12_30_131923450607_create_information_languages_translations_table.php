<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationLanguagesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information__languages_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('languages_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['languages_id', 'locale']);
            $table->foreign('languages_id')->references('id')->on('information__languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information__languages_translations', function (Blueprint $table) {
            $table->dropForeign(['languages_id']);
        });
        Schema::dropIfExists('information__languages_translations');
    }
}
