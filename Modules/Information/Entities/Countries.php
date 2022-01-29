<?php

namespace Modules\Information\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use Translatable;

    protected $table = 'information__countries';
    public $translatedAttributes = [];
    protected $fillable = [];
}
