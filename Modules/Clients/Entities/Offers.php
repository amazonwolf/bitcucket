<?php

namespace Modules\Clients\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use Translatable;

    protected $table = 'clients__offers';
    public $translatedAttributes = [];
    protected $fillable = [
'service_type','standard_type','nace_type','other_nace','risk_cat','prportion','outsourcing','management_sys','location_no','audit_type','total_no_emp','branches_no','loc_no','no_of_shifts','activity','no_prev_orders','no_of_first_order','no_of_branches_audit','employee_no','location_name','certifi_group','loc_type','docu_1','signed_offer','business_cond','additional_parts','certificate_inco','initial_audit_fee','days','price_audit','accom_cost0','surve0_fee','days_surve0','price_surve0','accom_cost1','first-surve_audit_fee','days_surve1','price_surve1','accom_cost2',
          'extra_audit_cost','other_fee','currency','final_offer_doc','date_of_offer'
           
           
    ];
}
