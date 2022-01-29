<?php

namespace Modules\Accounts\Repositories\Cache;

use Modules\Accounts\Repositories\PendingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePendingDecorator extends BaseCacheDecorator implements PendingRepository
{
    public function __construct(PendingRepository $pending)
    {
        parent::__construct();
        $this->entityName = 'accounts.pendings';
        $this->repository = $pending;
    }
}
