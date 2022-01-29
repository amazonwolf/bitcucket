<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/deci'], function (Router $router) {
    $router->bind('decis', function ($id) {
        return app('Modules\Deci\Repositories\DecisRepository')->find($id);
    });
    $router->get('decis', [
        'as' => 'admin.deci.decis.index',
        'uses' => 'DecisController@index',
        'middleware' => 'can:deci.decis.index'
    ]);
    $router->get('decis/create', [
        'as' => 'admin.deci.decis.create',
        'uses' => 'DecisController@create',
        'middleware' => 'can:deci.decis.create'
    ]);
    $router->post('decis', [
        'as' => 'admin.deci.decis.store',
        'uses' => 'DecisController@store',
        'middleware' => 'can:deci.decis.create'
    ]);
    $router->get('decis/{decis}/edit', [
        'as' => 'admin.deci.decis.edit',
        'uses' => 'DecisController@edit',
        'middleware' => 'can:deci.decis.edit'
    ]);
    $router->put('decis/{decis}', [
        'as' => 'admin.deci.decis.update',
        'uses' => 'DecisController@update',
        'middleware' => 'can:deci.decis.edit'
    ]);
    $router->delete('decis/{decis}', [
        'as' => 'admin.deci.decis.destroy',
        'uses' => 'DecisController@destroy',
        'middleware' => 'can:deci.decis.destroy'
    ]);
// append

});
