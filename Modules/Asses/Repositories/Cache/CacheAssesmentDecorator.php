<?php

namespace Modules\Asses\Repositories\Cache;

use Modules\Asses\Repositories\AssesmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAssesmentDecorator extends BaseCacheDecorator implements AssesmentRepository
{
    public function __construct(AssesmentRepository $assesment)
    {
        parent::__construct();
        $this->entityName = 'asses.assesments';
        $this->repository = $assesment;
    }
}
