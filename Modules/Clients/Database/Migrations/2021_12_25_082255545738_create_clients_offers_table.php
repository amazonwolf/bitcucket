<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients__offers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('service_type');
            $table->string('standard_type');
            $table->string('nace_type');
            $table->string('other_nace');
            $table->string('risk_cat');
            $table->string('prportion');
            $table->string('outsourcing');
            $table->string('management_sys');
            $table->integer('location_no');
            $table->string('audit_type');
            $table->integer('total_no_emp');
            $table->integer('branches_no');
            $table->string('loc_no');
            $table->string('no_of_shifts');
            $table->string('activity');
            $table->integer('no_prev_orders');
            $table->integer('no_of_first_order');
            $table->integer('no_of_branches_audit');
            $table->string('employee_no');
            $table->string('location_name');
            $table->string('certifi_group');
            $table->string('loc_type');
            $table->string('docu_1');
            $table->string('signed_offer');
            $table->string('business_cond');
            $table->string('additional_parts');
            $table->string('certificate_inco');
            $table->string('initial_audit_fee');
            $table->string('days');
            $table->string('price_audit');
            $table->string('accom_cost0');
            $table->string('surve0_fee');
            $table->string('days_surve0');  
            $table->string('price_surve0');
            $table->string('accom_cost1');
            $table->string('first-surve_audit_fee');
            $table->string('days_surve1');
            $table->string('price_surve1');
            $table->string('accom_cost2');
            $table->string('extra_audit_cost');
            $table->string('other_fee');
            $table->string('currency');
            $table->string('final_offer_doc');
            $table->date('date_of_offer');          
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
        Schema::dropIfExists('clients__offers');
    }
}
