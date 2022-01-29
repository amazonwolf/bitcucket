<?php

namespace Modules\Information\Entities;

use Illuminate\Database\Eloquent\Model;

class CountriesTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'information__countries_translations';
}
