<?php

namespace Modules\Audits\Repositories\Cache;

use Modules\Audits\Repositories\AuditRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAuditDecorator extends BaseCacheDecorator implements AuditRepository
{
    public function __construct(AuditRepository $audit)
    {
        parent::__construct();
        $this->entityName = 'audits.audits';
        $this->repository = $audit;
    }
}
