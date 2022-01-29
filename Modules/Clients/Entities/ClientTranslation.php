<?php

namespace Modules\Clients\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'clients__client_translations';
}
