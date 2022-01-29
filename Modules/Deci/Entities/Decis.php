<?php

namespace Modules\Deci\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Decis extends Model
{
    use Translatable;

    protected $table = 'deci__decis';
    public $translatedAttributes = [];
    protected $fillable = [];
}
