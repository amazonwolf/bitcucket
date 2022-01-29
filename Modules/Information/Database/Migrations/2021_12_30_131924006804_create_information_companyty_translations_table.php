<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationCompanytyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information__companyty_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('companyty_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['companyty_id', 'locale']);
            $table->foreign('companyty_id')->references('id')->on('information__companyties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information__companyty_translations', function (Blueprint $table) {
            $table->dropForeign(['companyty_id']);
        });
        Schema::dropIfExists('information__companyty_translations');
    }
}
