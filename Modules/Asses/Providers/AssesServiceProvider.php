<?php

namespace Modules\Asses\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Asses\Listeners\RegisterAssesSidebar;
use Illuminate\Support\Arr;

class AssesServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterAssesSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('assesments', Arr::dot(trans('asses::assesments')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('asses', 'permissions');

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
            'Modules\Asses\Repositories\AssesmentRepository',
            function () {
                $repository = new \Modules\Asses\Repositories\Eloquent\EloquentAssesmentRepository(new \Modules\Asses\Entities\Assesment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Asses\Repositories\Cache\CacheAssesmentDecorator($repository);
            }
        );
// add bindings

    }


}
