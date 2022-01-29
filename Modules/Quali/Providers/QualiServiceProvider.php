<?php

namespace Modules\Quali\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Quali\Listeners\RegisterQualiSidebar;
use Illuminate\Support\Arr;

class QualiServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterQualiSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('qualifis', Arr::dot(trans('quali::qualifis')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('quali', 'permissions');

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
            'Modules\Quali\Repositories\QualifiRepository',
            function () {
                $repository = new \Modules\Quali\Repositories\Eloquent\EloquentQualifiRepository(new \Modules\Quali\Entities\Qualifi());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Quali\Repositories\Cache\CacheQualifiDecorator($repository);
            }
        );
// add bindings

    }


}
