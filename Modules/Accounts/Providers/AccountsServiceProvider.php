<?php

namespace Modules\Accounts\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Accounts\Listeners\RegisterAccountsSidebar;
use Illuminate\support\Arr;

class AccountsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterAccountsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('pendings', Arr::dot(trans('accounts::pendings')));
            $event->load('approveds', Arr::dot(trans('accounts::approveds')));
            // append translations


        });


    }

    public function boot()
    {
        $this->publishConfig('accounts', 'permissions');

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
            'Modules\Accounts\Repositories\PendingRepository',
            function () {
                $repository = new \Modules\Accounts\Repositories\Eloquent\EloquentPendingRepository(new \Modules\Accounts\Entities\Pending());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Accounts\Repositories\Cache\CachePendingDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Accounts\Repositories\ApprovedRepository',
            function () {
                $repository = new \Modules\Accounts\Repositories\Eloquent\EloquentApprovedRepository(new \Modules\Accounts\Entities\Approved());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Accounts\Repositories\Cache\CacheApprovedDecorator($repository);
            }
        );
// add bindings


    }


}
