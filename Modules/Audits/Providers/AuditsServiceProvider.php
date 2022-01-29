<?php

namespace Modules\Audits\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Audits\Listeners\RegisterAuditsSidebar;
use Illuminate\Support\Arr;

class AuditsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterAuditsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('audits', Arr::dot(trans('audits::audits')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('audits', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Audits\Repositories\AuditRepository',
            function () {
                $repository = new \Modules\Audits\Repositories\Eloquent\EloquentAuditRepository(new \Modules\Audits\Entities\Audit());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Audits\Repositories\Cache\CacheAuditDecorator($repository);
            }
        );
// add bindings

    }


}
