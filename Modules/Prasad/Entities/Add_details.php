<?php

namespace Modules\Prasad\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Add_details extends Model
{
    use Translatable;

    protected $table = 'prasad__add_details';
    public $translatedAttributes = [];
    protected $fillable = [];
}
