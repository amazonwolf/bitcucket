<?php

namespace Modules\Clients\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Clients\Listeners\RegisterClientsSidebar;
use Illuminate\Support\Arr;
class ClientsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterClientsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('clients', Arr::dot(trans('clients::clients')));
            $event->load('offers', Arr::dot(trans('clients::offers')));
            // append translations


        });


    }

    public function boot()
    {
        $this->publishConfig('clients', 'permissions');

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
            'Modules\Clients\Repositories\ClientRepository',
            function () {
                $repository = new \Modules\Clients\Repositories\Eloquent\EloquentClientRepository(new \Modules\Clients\Entities\Client());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Clients\Repositories\Cache\CacheClientDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Clients\Repositories\OffersRepository',
            function () {
                $repository = new \Modules\Clients\Repositories\Eloquent\EloquentOffersRepository(new \Modules\Clients\Entities\Offers());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Clients\Repositories\Cache\CacheOffersDecorator($repository);
            }
        );
// add bindings


    }


}
