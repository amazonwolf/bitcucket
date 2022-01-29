<?php

namespace Modules\Clients\Repositories\Cache;

use Modules\Clients\Repositories\ClientRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheClientDecorator extends BaseCacheDecorator implements ClientRepository
{
    public function __construct(ClientRepository $client)
    {
        parent::__construct();
        $this->entityName = 'clients.clients';
        $this->repository = $client;
    }
}
