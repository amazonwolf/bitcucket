<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentAppointTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment__appoint_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('appoint_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['appoint_id', 'locale']);
            $table->foreign('appoint_id')->references('id')->on('appointment__appoints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment__appoint_translations', function (Blueprint $table) {
            $table->dropForeign(['appoint_id']);
        });
        Schema::dropIfExists('appointment__appoint_translations');
    }
}
