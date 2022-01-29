<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualiQualifiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quali__qualifi_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('qualifi_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['qualifi_id', 'locale']);
            $table->foreign('qualifi_id')->references('id')->on('quali__qualifis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quali__qualifi_translations', function (Blueprint $table) {
            $table->dropForeign(['qualifi_id']);
        });
        Schema::dropIfExists('quali__qualifi_translations');
    }
}
