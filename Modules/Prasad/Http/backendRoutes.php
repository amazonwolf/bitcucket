<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/prasad'], function (Router $router) {
    $router->bind('add_details', function ($id) {
        return app('Modules\Prasad\Repositories\Add_detailsRepository')->find($id);
    });
    $router->get('add_details', [
        'as' => 'admin.prasad.add_details.index',
        'uses' => 'Add_detailsController@index',
        'middleware' => 'can:prasad.add_details.index'
    ]);
    $router->get('add_details/create', [
        'as' => 'admin.prasad.add_details.create',
        'uses' => 'Add_detailsController@create',
        'middleware' => 'can:prasad.add_details.create'
    ]);
    $router->post('add_details', [
        'as' => 'admin.prasad.add_details.store',
        'uses' => 'Add_detailsController@store',
        'middleware' => 'can:prasad.add_details.create'
    ]);
    $router->get('add_details/{add_details}/edit', [
        'as' => 'admin.prasad.add_details.edit',
        'uses' => 'Add_detailsController@edit',
        'middleware' => 'can:prasad.add_details.edit'
    ]);
    $router->put('add_details/{add_details}', [
        'as' => 'admin.prasad.add_details.update',
        'uses' => 'Add_detailsController@update',
        'middleware' => 'can:prasad.add_details.edit'
    ]);
    $router->delete('add_details/{add_details}', [
        'as' => 'admin.prasad.add_details.destroy',
        'uses' => 'Add_detailsController@destroy',
        'middleware' => 'can:prasad.add_details.destroy'
    ]);
    $router->bind('delete_details', function ($id) {
        return app('Modules\Prasad\Repositories\Delete_detailsRepository')->find($id);
    });
    $router->get('delete_details', [
        'as' => 'admin.prasad.delete_details.index',
        'uses' => 'Delete_detailsController@index',
        'middleware' => 'can:prasad.delete_details.index'
    ]);
    $router->get('delete_details/create', [
        'as' => 'admin.prasad.delete_details.create',
        'uses' => 'Delete_detailsController@create',
        'middleware' => 'can:prasad.delete_details.create'
    ]);
    $router->post('delete_details', [
        'as' => 'admin.prasad.delete_details.store',
        'uses' => 'Delete_detailsController@store',
        'middleware' => 'can:prasad.delete_details.create'
    ]);
    $router->get('delete_details/{delete_details}/edit', [
        'as' => 'admin.prasad.delete_details.edit',
        'uses' => 'Delete_detailsController@edit',
        'middleware' => 'can:prasad.delete_details.edit'
    ]);
    $router->put('delete_details/{delete_details}', [
        'as' => 'admin.prasad.delete_details.update',
        'uses' => 'Delete_detailsController@update',
        'middleware' => 'can:prasad.delete_details.edit'
    ]);
    $router->delete('delete_details/{delete_details}', [
        'as' => 'admin.prasad.delete_details.destroy',
        'uses' => 'Delete_detailsController@destroy',
        'middleware' => 'can:prasad.delete_details.destroy'
    ]);
// append


});
