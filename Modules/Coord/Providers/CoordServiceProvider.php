<?php

namespace Modules\Coord\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Coord\Listeners\RegisterCoordSidebar;
use illuminate\support\Arr;

class CoordServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCoordSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('auditors', Arr::dot(trans('coord::auditors')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('coord', 'permissions');

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
            'Modules\Coord\Repositories\AuditorRepository',
            function () {
                $repository = new \Modules\Coord\Repositories\Eloquent\EloquentAuditorRepository(new \Modules\Coord\Entities\Auditor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Coord\Repositories\Cache\CacheAuditorDecorator($repository);
            }
        );
// add bindings

    }


}
