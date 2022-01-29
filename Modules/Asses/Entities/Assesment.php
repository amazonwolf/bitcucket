<?php

namespace Modules\Asses\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use Translatable;

    protected $table = 'asses__assesments';
    public $translatedAttributes = [];
    protected $fillable = [];
}
