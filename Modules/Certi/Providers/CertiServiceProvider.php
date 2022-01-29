<?php

namespace Modules\Certi\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Certi\Listeners\RegisterCertiSidebar;
use Illuminate\Support\Arr;

class CertiServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCertiSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('certificates', Arr::dot(trans('certi::certificates')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('certi', 'permissions');

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
            'Modules\Certi\Repositories\CertificateRepository',
            function () {
                $repository = new \Modules\Certi\Repositories\Eloquent\EloquentCertificateRepository(new \Modules\Certi\Entities\Certificate());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Certi\Repositories\Cache\CacheCertificateDecorator($repository);
            }
        );
// add bindings

    }


}
