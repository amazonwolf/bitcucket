<?php

namespace Modules\Information\Entities;

use Illuminate\Database\Eloquent\Model;

class LanguagesTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'information__languages_translations';
}
