<?php

namespace Modules\Prasad\Repositories\Cache;

use Modules\Prasad\Repositories\Delete_detailsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDelete_detailsDecorator extends BaseCacheDecorator implements Delete_detailsRepository
{
    public function __construct(Delete_detailsRepository $delete_details)
    {
        parent::__construct();
        $this->entityName = 'prasad.delete_details';
        $this->repository = $delete_details;
    }
}
