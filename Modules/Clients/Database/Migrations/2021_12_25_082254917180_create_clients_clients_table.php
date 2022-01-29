<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients__clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('comp_name');
            $table->integer('reg_no');
            $table->boolean('natural_person')->default(0);
            $table->string('vat_id');
            $table->string('web_link');
            $table->string('street_add');
            $table->string('city_name');
            $table->string('zip_code');
            $table->string('country_id');
            $table->string('cantact_name');
            $table->string('cantact_email');
            $table->string('cantact_phone');
            $table->string('contact_position');
            $table->string('contact_language');
            $table->string('contact_name_cert');
            $table->string('cantact_email_cert');
            $table->string('cantact_phone_cert');
            $table->string('contact_position_cert');
            $table->string('contact_language_cert');
            $table->string('contact_name_fina');
            $table->string('cantact_email_fina');
            $table->string('cantact_phone_fina');
            $table->string('contact_language_fina');
            $table->string('company_logo');
            $table->string('comp_name_eng');
            $table->string('street_add_eng');
            $table->string('city_name_eng');
            $table->string('company_type');
            $table->string('company_name_invoice');
            $table->string('payment_method');
            $table->boolean('status')->default(0);

            $table->timestamps();
            $table->foreign('country_id')->references('name')->on('information__countries')->onDelete('cascade');
            $table->foreign('contact_language')->references('name')->on('information__languages')->onDelete('cascade');
              $table->foreign('contact_language_cert')->references('name')->on('information__languages')->onDelete('cascade');
            $table->foreign('company_type')->references('name')->on('information__companyties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients__clients');
    }
}
