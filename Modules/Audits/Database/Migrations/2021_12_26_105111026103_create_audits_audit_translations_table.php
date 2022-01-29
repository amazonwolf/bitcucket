<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsAuditTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits__audit_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('audit_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['audit_id', 'locale']);
            $table->foreign('audit_id')->references('id')->on('audits__audits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audits__audit_translations', function (Blueprint $table) {
            $table->dropForeign(['audit_id']);
        });
        Schema::dropIfExists('audits__audit_translations');
    }
}
