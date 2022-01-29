<?php

namespace Modules\Coord\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    use Translatable;

    protected $table = 'coord__auditors';
    public $translatedAttributes = [];
    protected $fillable = ['name','address','city','timing'];
}
