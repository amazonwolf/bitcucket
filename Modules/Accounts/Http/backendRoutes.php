<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/accounts'], function (Router $router) {
    $router->bind('pending', function ($id) {
        return app('Modules\Accounts\Repositories\PendingRepository')->find($id);
    });
    $router->get('pendings', [
        'as' => 'admin.accounts.pending.index',
        'uses' => 'PendingController@index',
        'middleware' => 'can:accounts.pendings.index'
    ]);
    $router->get('pendings/create', [
        'as' => 'admin.accounts.pending.create',
        'uses' => 'PendingController@create',
        'middleware' => 'can:accounts.pendings.create'
    ]);
    $router->post('pendings', [
        'as' => 'admin.accounts.pending.store',
        'uses' => 'PendingController@store',
        'middleware' => 'can:accounts.pendings.create'
    ]);
    $router->get('pendings/{pending}/edit', [
        'as' => 'admin.accounts.pending.edit',
        'uses' => 'PendingController@edit',
        'middleware' => 'can:accounts.pendings.edit'
    ]);
    $router->put('pendings/{pending}', [
        'as' => 'admin.accounts.pending.update',
        'uses' => 'PendingController@update',
        'middleware' => 'can:accounts.pendings.edit'
    ]);
    $router->delete('pendings/{pending}', [
        'as' => 'admin.accounts.pending.destroy',
        'uses' => 'PendingController@destroy',
        'middleware' => 'can:accounts.pendings.destroy'
    ]);
    $router->bind('approved', function ($id) {
        return app('Modules\Accounts\Repositories\ApprovedRepository')->find($id);
    });
    $router->get('approveds', [
        'as' => 'admin.accounts.approved.index',
        'uses' => 'ApprovedController@index',
        'middleware' => 'can:accounts.approveds.index'
    ]);
    $router->get('approveds/create', [
        'as' => 'admin.accounts.approved.create',
        'uses' => 'ApprovedController@create',
        'middleware' => 'can:accounts.approveds.create'
    ]);
    $router->post('approveds', [
        'as' => 'admin.accounts.approved.store',
        'uses' => 'ApprovedController@store',
        'middleware' => 'can:accounts.approveds.create'
    ]);
    $router->get('approveds/{approved}/edit', [
        'as' => 'admin.accounts.approved.edit',
        'uses' => 'ApprovedController@edit',
        'middleware' => 'can:accounts.approveds.edit'
    ]);
    $router->put('approveds/{approved}', [
        'as' => 'admin.accounts.approved.update',
        'uses' => 'ApprovedController@update',
        'middleware' => 'can:accounts.approveds.edit'
    ]);
    $router->delete('approveds/{approved}', [
        'as' => 'admin.accounts.approved.destroy',
        'uses' => 'ApprovedController@destroy',
        'middleware' => 'can:accounts.approveds.destroy'
    ]);
// append


});
