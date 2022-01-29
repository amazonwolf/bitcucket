<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssesAssesmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asses__assesment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('assesment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['assesment_id', 'locale']);
            $table->foreign('assesment_id')->references('id')->on('asses__assesments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asses__assesment_translations', function (Blueprint $table) {
            $table->dropForeign(['assesment_id']);
        });
        Schema::dropIfExists('asses__assesment_translations');
    }
}
