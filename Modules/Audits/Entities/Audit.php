<?php

namespace Modules\Audits\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use Translatable;

    protected $table = 'audits__audits';
    public $translatedAttributes = [];
    protected $fillable = [];
}
