<?php

namespace Modules\Information\Repositories\Cache;

use Modules\Information\Repositories\LanguagesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLanguagesDecorator extends BaseCacheDecorator implements LanguagesRepository
{
    public function __construct(LanguagesRepository $languages)
    {
        parent::__construct();
        $this->entityName = 'information.languages';
        $this->repository = $languages;
    }
}
