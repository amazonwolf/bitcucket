<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAjayToTestingAjaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testing__ajays', function (Blueprint $table) {
            $table->string("ajay");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testing__ajays', function (Blueprint $table) {
            $table->dropColumn("ajay");
        });
    }
}
