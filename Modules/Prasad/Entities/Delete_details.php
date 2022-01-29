<?php

namespace Modules\Prasad\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Delete_details extends Model
{
    use Translatable;

    protected $table = 'prasad__delete_details';
    public $translatedAttributes = [];
    protected $fillable = [];
}
