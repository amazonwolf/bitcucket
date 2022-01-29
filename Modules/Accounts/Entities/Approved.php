<?php

namespace Modules\Accounts\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Approved extends Model
{
    use Translatable;

    protected $table = 'accounts__approveds';
    public $translatedAttributes = [];
    protected $fillable = [];
}
