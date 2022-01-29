<?php

namespace Modules\Information\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use Translatable;

    protected $table = 'information__languages';
    public $translatedAttributes = [];
    protected $fillable = [];
}
