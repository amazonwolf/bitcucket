<?php

namespace Modules\Appointment\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'appointment__appoint_translations';
}
