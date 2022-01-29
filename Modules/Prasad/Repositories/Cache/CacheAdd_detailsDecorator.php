<?php

namespace Modules\Prasad\Repositories\Cache;

use Modules\Prasad\Repositories\Add_detailsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAdd_detailsDecorator extends BaseCacheDecorator implements Add_detailsRepository
{
    public function __construct(Add_detailsRepository $add_details)
    {
        parent::__construct();
        $this->entityName = 'prasad.add_details';
        $this->repository = $add_details;
    }
}
