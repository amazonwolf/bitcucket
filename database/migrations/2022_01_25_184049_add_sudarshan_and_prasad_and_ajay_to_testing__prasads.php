<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSudarshanAndPrasadAndAjayToTestingPrasads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testing__prasads', function (Blueprint $table) {
            $table->string('sudarshan');
        $table->string('prasad');
        $table->string('ajay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testing__prasads', function (Blueprint $table) {
            $table->string('sudarshan');
            $table->string('prasad');
            $table->string('ajay');
        });
    }
}
