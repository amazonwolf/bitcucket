<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsApprovedTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts__approved_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('approved_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['approved_id', 'locale']);
            $table->foreign('approved_id')->references('id')->on('accounts__approveds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts__approved_translations', function (Blueprint $table) {
            $table->dropForeign(['approved_id']);
        });
        Schema::dropIfExists('accounts__approved_translations');
    }
}
