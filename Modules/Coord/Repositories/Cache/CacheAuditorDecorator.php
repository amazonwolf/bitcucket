<?php

namespace Modules\Coord\Repositories\Cache;

use Modules\Coord\Repositories\AuditorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAuditorDecorator extends BaseCacheDecorator implements AuditorRepository
{
    public function __construct(AuditorRepository $auditor)
    {
        parent::__construct();
        $this->entityName = 'coord.auditors';
        $this->repository = $auditor;
    }
}
