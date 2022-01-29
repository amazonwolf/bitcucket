<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/clients'], function (Router $router) {
    $router->bind('client', function ($id) {
        return app('Modules\Clients\Repositories\ClientRepository')->find($id);
    });
    $router->get('clients', [
        'as' => 'admin.clients.client.index',
        'uses' => 'ClientController@index',
        'middleware' => 'can:clients.clients.index'
    ]);
    $router->get('clients/create', [
        'as' => 'admin.clients.client.create',
        'uses' => 'ClientController@create',
        'middleware' => 'can:clients.clients.create'
    ]);
    $router->post('clients', [
        'as' => 'admin.clients.client.store',
        'uses' => 'ClientController@store',
        'middleware' => 'can:clients.clients.create'
    ]);
    $router->get('clients/{client}/edit', [
        'as' => 'admin.clients.client.edit',
        'uses' => 'ClientController@edit',
        'middleware' => 'can:clients.clients.edit'
    ]);
    $router->put('clients/{client}', [
        'as' => 'admin.clients.client.update',
        'uses' => 'ClientController@update',
        'middleware' => 'can:clients.clients.edit'
    ]);
    $router->delete('clients/{client}', [
        'as' => 'admin.clients.client.destroy',
        'uses' => 'ClientController@destroy',
        'middleware' => 'can:clients.clients.destroy'
    ]);
    $router->bind('offers', function ($id) {
        return app('Modules\Clients\Repositories\OffersRepository')->find($id);
    });
    $router->get('offers', [
        'as' => 'admin.clients.offers.index',
        'uses' => 'OffersController@index',
        'middleware' => 'can:clients.offers.index'
    ]);
    $router->get('offers/create', [
        'as' => 'admin.clients.offers.create',
        'uses' => 'OffersController@create',
        'middleware' => 'can:clients.offers.create'
    ]);
    $router->post('offers', [
        'as' => 'admin.clients.offers.store',
        'uses' => 'OffersController@store',
        'middleware' => 'can:clients.offers.create'
    ]);
    $router->get('offers/{offers}/edit', [
        'as' => 'admin.clients.offers.edit',
        'uses' => 'OffersController@edit',
        'middleware' => 'can:clients.offers.edit'
    ]);
    $router->put('offers/{offers}', [
        'as' => 'admin.clients.offers.update',
        'uses' => 'OffersController@update',
        'middleware' => 'can:clients.offers.edit'
    ]);
    $router->delete('offers/{offers}', [
        'as' => 'admin.clients.offers.destroy',
        'uses' => 'OffersController@destroy',
        'middleware' => 'can:clients.offers.destroy'
    ]);
// append


});
