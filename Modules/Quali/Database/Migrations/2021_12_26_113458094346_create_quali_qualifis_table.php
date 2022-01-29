<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualiQualifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quali__qualifis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
             $table->integer('quali_id')->unsigned();
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
        Schema::dropIfExists('quali__qualifis');
    }
}
