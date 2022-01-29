<?php

namespace Modules\Certi\Entities;

use Illuminate\Database\Eloquent\Model;

class CertificateTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'certi__certificate_translations';
}
