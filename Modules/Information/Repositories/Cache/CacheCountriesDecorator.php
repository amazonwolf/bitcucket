<?php

namespace Modules\Information\Repositories\Cache;

use Modules\Information\Repositories\CountriesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCountriesDecorator extends BaseCacheDecorator implements CountriesRepository
{
    public function __construct(CountriesRepository $countries)
    {
        parent::__construct();
        $this->entityName = 'information.countries';
        $this->repository = $countries;
    }
}
