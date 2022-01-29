<?php

namespace Modules\Deci\Entities;

use Illuminate\Database\Eloquent\Model;

class DecisTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'deci__decis_translations';
}
