<?php

namespace Modules\Certi\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use Translatable;

    protected $table = 'certi__certificates';
    public $translatedAttributes = [];
    protected $fillable = [];
}
