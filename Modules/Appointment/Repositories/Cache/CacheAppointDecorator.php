<?php

namespace Modules\Appointment\Repositories\Cache;

use Modules\Appointment\Repositories\AppointRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAppointDecorator extends BaseCacheDecorator implements AppointRepository
{
    public function __construct(AppointRepository $appoint)
    {
        parent::__construct();
        $this->entityName = 'appointment.appoints';
        $this->repository = $appoint;
    }
}
