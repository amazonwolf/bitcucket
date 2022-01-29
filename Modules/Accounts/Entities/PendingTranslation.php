<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class PendingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'accounts__pending_translations';
}
