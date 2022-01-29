<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/information'], function (Router $router) {
    $router->bind('countries', function ($id) {
        return app('Modules\Information\Repositories\CountriesRepository')->find($id);
    });
    $router->get('countries', [
        'as' => 'admin.information.countries.index',
        'uses' => 'CountriesController@index',
        'middleware' => 'can:information.countries.index'
    ]);
    $router->get('countries/create', [
        'as' => 'admin.information.countries.create',
        'uses' => 'CountriesController@create',
        'middleware' => 'can:information.countries.create'
    ]);
    $router->post('countries', [
        'as' => 'admin.information.countries.store',
        'uses' => 'CountriesController@store',
        'middleware' => 'can:information.countries.create'
    ]);
    $router->get('countries/{countries}/edit', [
        'as' => 'admin.information.countries.edit',
        'uses' => 'CountriesController@edit',
        'middleware' => 'can:information.countries.edit'
    ]);
    $router->put('countries/{countries}', [
        'as' => 'admin.information.countries.update',
        'uses' => 'CountriesController@update',
        'middleware' => 'can:information.countries.edit'
    ]);
    $router->delete('countries/{countries}', [
        'as' => 'admin.information.countries.destroy',
        'uses' => 'CountriesController@destroy',
        'middleware' => 'can:information.countries.destroy'
    ]);
    $router->bind('languages', function ($id) {
        return app('Modules\Information\Repositories\LanguagesRepository')->find($id);
    });
    $router->get('languages', [
        'as' => 'admin.information.languages.index',
        'uses' => 'LanguagesController@index',
        'middleware' => 'can:information.languages.index'
    ]);
    $router->get('languages/create', [
        'as' => 'admin.information.languages.create',
        'uses' => 'LanguagesController@create',
        'middleware' => 'can:information.languages.create'
    ]);
    $router->post('languages', [
        'as' => 'admin.information.languages.store',
        'uses' => 'LanguagesController@store',
        'middleware' => 'can:information.languages.create'
    ]);
    $router->get('languages/{languages}/edit', [
        'as' => 'admin.information.languages.edit',
        'uses' => 'LanguagesController@edit',
        'middleware' => 'can:information.languages.edit'
    ]);
    $router->put('languages/{languages}', [
        'as' => 'admin.information.languages.update',
        'uses' => 'LanguagesController@update',
        'middleware' => 'can:information.languages.edit'
    ]);
    $router->delete('languages/{languages}', [
        'as' => 'admin.information.languages.destroy',
        'uses' => 'LanguagesController@destroy',
        'middleware' => 'can:information.languages.destroy'
    ]);
    $router->bind('companyty', function ($id) {
        return app('Modules\Information\Repositories\CompanytyRepository')->find($id);
    });
    $router->get('companyties', [
        'as' => 'admin.information.companyty.index',
        'uses' => 'CompanytyController@index',
        'middleware' => 'can:information.companyties.index'
    ]);
    $router->get('companyties/create', [
        'as' => 'admin.information.companyty.create',
        'uses' => 'CompanytyController@create',
        'middleware' => 'can:information.companyties.create'
    ]);
    $router->post('companyties', [
        'as' => 'admin.information.companyty.store',
        'uses' => 'CompanytyController@store',
        'middleware' => 'can:information.companyties.create'
    ]);
    $router->get('companyties/{companyty}/edit', [
        'as' => 'admin.information.companyty.edit',
        'uses' => 'CompanytyController@edit',
        'middleware' => 'can:information.companyties.edit'
    ]);
    $router->put('companyties/{companyty}', [
        'as' => 'admin.information.companyty.update',
        'uses' => 'CompanytyController@update',
        'middleware' => 'can:information.companyties.edit'
    ]);
    $router->delete('companyties/{companyty}', [
        'as' => 'admin.information.companyty.destroy',
        'uses' => 'CompanytyController@destroy',
        'middleware' => 'can:information.companyties.destroy'
    ]);
// append



});
