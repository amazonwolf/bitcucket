<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class ApprovedTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'accounts__approved_translations';
}
