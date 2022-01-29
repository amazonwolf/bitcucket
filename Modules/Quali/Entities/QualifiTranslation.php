<?php

namespace Modules\Quali\Entities;

use Illuminate\Database\Eloquent\Model;

class QualifiTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'quali__qualifi_translations';
}
