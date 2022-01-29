<?php

namespace Modules\Asses\Entities;

use Illuminate\Database\Eloquent\Model;

class AssesmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'asses__assesment_translations';
}
