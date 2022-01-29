<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertiCertificateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certi__certificate_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('certificate_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['certificate_id', 'locale']);
            $table->foreign('certificate_id')->references('id')->on('certi__certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certi__certificate_translations', function (Blueprint $table) {
            $table->dropForeign(['certificate_id']);
        });
        Schema::dropIfExists('certi__certificate_translations');
    }
}
