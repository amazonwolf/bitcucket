<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeciDecisTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deci__decis_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('decis_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['decis_id', 'locale']);
            $table->foreign('decis_id')->references('id')->on('deci__decis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deci__decis_translations', function (Blueprint $table) {
            $table->dropForeign(['decis_id']);
        });
        Schema::dropIfExists('deci__decis_translations');
    }
}
