<?php

namespace Modules\Deci\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Deci\Listeners\RegisterDeciSidebar;
use Illuminate\Support\Arr;

class DeciServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDeciSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('decis', Arr::dot(trans('deci::decis')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('deci', 'permissions');

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
            'Modules\Deci\Repositories\DecisRepository',
            function () {
                $repository = new \Modules\Deci\Repositories\Eloquent\EloquentDecisRepository(new \Modules\Deci\Entities\Decis());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Deci\Repositories\Cache\CacheDecisDecorator($repository);
            }
        );
// add bindings

    }


}
