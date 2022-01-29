<?php

namespace Modules\Information\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Information\Listeners\RegisterInformationSidebar;
use Illuminate\Support\Arr;

class InformationServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterInformationSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('countries', Arr::dot(trans('information::countries')));
            $event->load('languages', Arr::dot(trans('information::languages')));
            $event->load('companyties', Arr::dot(trans('information::companyties')));
            // append translations



        });


    }

    public function boot()
    {
        $this->publishConfig('information', 'permissions');

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
            'Modules\Information\Repositories\CountriesRepository',
            function () {
                $repository = new \Modules\Information\Repositories\Eloquent\EloquentCountriesRepository(new \Modules\Information\Entities\Countries());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Information\Repositories\Cache\CacheCountriesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Information\Repositories\LanguagesRepository',
            function () {
                $repository = new \Modules\Information\Repositories\Eloquent\EloquentLanguagesRepository(new \Modules\Information\Entities\Languages());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Information\Repositories\Cache\CacheLanguagesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Information\Repositories\CompanytyRepository',
            function () {
                $repository = new \Modules\Information\Repositories\Eloquent\EloquentCompanytyRepository(new \Modules\Information\Entities\Companyty());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Information\Repositories\Cache\CacheCompanytyDecorator($repository);
            }
        );
// add bindings



    }


}
