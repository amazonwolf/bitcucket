<?php

namespace Modules\Accounts\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    use Translatable;

    protected $table = 'accounts__pendings';
    public $translatedAttributes = [];
    protected $fillable = [];
}
