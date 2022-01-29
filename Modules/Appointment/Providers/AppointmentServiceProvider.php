<?php

namespace Modules\Appointment\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Appointment\Listeners\RegisterAppointmentSidebar;
use Illuminate\Support\Arr;

class AppointmentServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterAppointmentSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('appoints', Arr::dot(trans('appointment::appoints')));
            // append translations

        });


    }

    public function boot()
    {
        $this->publishConfig('appointment', 'permissions');

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
            'Modules\Appointment\Repositories\AppointRepository',
            function () {
                $repository = new \Modules\Appointment\Repositories\Eloquent\EloquentAppointRepository(new \Modules\Appointment\Entities\Appoint());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Appointment\Repositories\Cache\CacheAppointDecorator($repository);
            }
        );
// add bindings

    }


}
