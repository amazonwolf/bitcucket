<?php

namespace Modules\Clients\Repositories\Cache;

use Modules\Clients\Repositories\OffersRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOffersDecorator extends BaseCacheDecorator implements OffersRepository
{
    public function __construct(OffersRepository $offers)
    {
        parent::__construct();
        $this->entityName = 'clients.offers';
        $this->repository = $offers;
    }
}
