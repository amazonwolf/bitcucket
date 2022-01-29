<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment__appoints', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
              $table->integer('audit_id')->unsigned();
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
        Schema::dropIfExists('appointment__appoints');
    }
}
