<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeciDecisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deci__decis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
              $table->integer('deci_id')->unsigned();
            $table->string('name');
            $table->string('phoneno');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deci__decis');
    }
}
