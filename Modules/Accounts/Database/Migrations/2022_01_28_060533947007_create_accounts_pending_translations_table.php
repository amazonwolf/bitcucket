<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsPendingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts__pending_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('pending_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['pending_id', 'locale']);
            $table->foreign('pending_id')->references('id')->on('accounts__pendings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts__pending_translations', function (Blueprint $table) {
            $table->dropForeign(['pending_id']);
        });
        Schema::dropIfExists('accounts__pending_translations');
    }
}
