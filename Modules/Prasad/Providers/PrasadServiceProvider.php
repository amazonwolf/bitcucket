<?php

namespace Modules\Prasad\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Prasad\Listeners\RegisterPrasadSidebar;

class PrasadServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterPrasadSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('add_details', array_dot(trans('prasad::add_details')));
            $event->load('delete_details', array_dot(trans('prasad::delete_details')));
            // append translations


        });


    }

    public function boot()
    {
        $this->publishConfig('prasad', 'permissions');

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
            'Modules\Prasad\Repositories\Add_detailsRepository',
            function () {
                $repository = new \Modules\Prasad\Repositories\Eloquent\EloquentAdd_detailsRepository(new \Modules\Prasad\Entities\Add_details());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Prasad\Repositories\Cache\CacheAdd_detailsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Prasad\Repositories\Delete_detailsRepository',
            function () {
                $repository = new \Modules\Prasad\Repositories\Eloquent\EloquentDelete_detailsRepository(new \Modules\Prasad\Entities\Delete_details());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Prasad\Repositories\Cache\CacheDelete_detailsDecorator($repository);
            }
        );
// add bindings


    }


}
