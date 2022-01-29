<?php

namespace Modules\Clients\Entities;

use Illuminate\Database\Eloquent\Model;

class OffersTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'clients__offers_translations';
}
