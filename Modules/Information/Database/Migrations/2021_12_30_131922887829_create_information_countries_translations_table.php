<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationCountriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information__countries_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('countries_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['countries_id', 'locale']);
            $table->foreign('countries_id')->references('id')->on('information__countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information__countries_translations', function (Blueprint $table) {
            $table->dropForeign(['countries_id']);
        });
        Schema::dropIfExists('information__countries_translations');
    }
}
