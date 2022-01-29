<?php

namespace Modules\Clients\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Translatable;

    protected $table = 'clients__clients';
    public $translatedAttributes = [];
    protected $fillable = [
     'comp_name','reg_no','image','natural_person','vat_id','web_link','street_add','city_name','zip_code','country_id','cantact_name','cantact_email','cantact_phone','contact_position','contact_language','contact_name_cert','cantact_email_cert','cantact_phone_cert','contact_position_cert','contact_language_cert','contact_name_fina','cantact_email_fina','cantact_phone_fina','contact_language_fina','company_logo','status','comp_name_eng','street_add_eng','city_name_eng','company_type','company_name_invoice','payment_method'
            
           
    ];
}
