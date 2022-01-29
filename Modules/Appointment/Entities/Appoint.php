<?php

namespace Modules\Appointment\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Appoint extends Model
{
    use Translatable;

    protected $table = 'appointment__appoints';
    public $translatedAttributes = [];
    protected $fillable = [];
}
