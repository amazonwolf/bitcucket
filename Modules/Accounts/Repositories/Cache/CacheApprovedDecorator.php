<?php

namespace Modules\Accounts\Repositories\Cache;

use Modules\Accounts\Repositories\ApprovedRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheApprovedDecorator extends BaseCacheDecorator implements ApprovedRepository
{
    public function __construct(ApprovedRepository $approved)
    {
        parent::__construct();
        $this->entityName = 'accounts.approveds';
        $this->repository = $approved;
    }
}
