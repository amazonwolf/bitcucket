<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordAuditorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coord__auditor_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('auditor_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['auditor_id', 'locale']);
            $table->foreign('auditor_id')->references('id')->on('coord__auditors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coord__auditor_translations', function (Blueprint $table) {
            $table->dropForeign(['auditor_id']);
        });
        Schema::dropIfExists('coord__auditor_translations');
    }
}
