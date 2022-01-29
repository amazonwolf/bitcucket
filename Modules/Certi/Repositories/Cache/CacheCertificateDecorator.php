<?php

namespace Modules\Certi\Repositories\Cache;

use Modules\Certi\Repositories\CertificateRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCertificateDecorator extends BaseCacheDecorator implements CertificateRepository
{
    public function __construct(CertificateRepository $certificate)
    {
        parent::__construct();
        $this->entityName = 'certi.certificates';
        $this->repository = $certificate;
    }
}
