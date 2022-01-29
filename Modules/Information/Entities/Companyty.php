<?php

namespace Modules\Information\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Companyty extends Model
{
    use Translatable;

    protected $table = 'information__companyties';
    public $translatedAttributes = [];
    protected $fillable = [];
}
