<?php

namespace Modules\Quali\Repositories\Cache;

use Modules\Quali\Repositories\QualifiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQualifiDecorator extends BaseCacheDecorator implements QualifiRepository
{
    public function __construct(QualifiRepository $qualifi)
    {
        parent::__construct();
        $this->entityName = 'quali.qualifis';
        $this->repository = $qualifi;
    }
}
