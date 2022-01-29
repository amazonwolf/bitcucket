<?php

namespace Modules\Deci\Repositories\Cache;

use Modules\Deci\Repositories\DecisRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDecisDecorator extends BaseCacheDecorator implements DecisRepository
{
    public function __construct(DecisRepository $decis)
    {
        parent::__construct();
        $this->entityName = 'deci.decis';
        $this->repository = $decis;
    }
}
