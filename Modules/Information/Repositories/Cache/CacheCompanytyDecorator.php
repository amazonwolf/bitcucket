<?php

namespace Modules\Information\Repositories\Cache;

use Modules\Information\Repositories\CompanytyRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCompanytyDecorator extends BaseCacheDecorator implements CompanytyRepository
{
    public function __construct(CompanytyRepository $companyty)
    {
        parent::__construct();
        $this->entityName = 'information.companyties';
        $this->repository = $companyty;
    }
}
