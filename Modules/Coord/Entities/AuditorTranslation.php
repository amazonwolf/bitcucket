<?php

namespace Modules\Coord\Entities;

use Illuminate\Database\Eloquent\Model;

class AuditorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'coord__auditor_translations';
}
