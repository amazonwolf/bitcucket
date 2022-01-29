<?php

namespace Modules\Quali\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qualifi extends Model
{
    use Translatable;

    protected $table = 'quali__qualifis';
    public $translatedAttributes = [];
    protected $fillable = [];
}
