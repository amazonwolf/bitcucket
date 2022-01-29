<?php

namespace Modules\Audits\Entities;

use Illuminate\Database\Eloquent\Model;

class AuditTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'audits__audit_translations';
}
