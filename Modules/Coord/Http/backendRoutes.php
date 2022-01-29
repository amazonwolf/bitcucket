<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/coord'], function (Router $router) {
    $router->bind('auditor', function ($id) {
        return app('Modules\Coord\Repositories\AuditorRepository')->find($id);
    });
    $router->get('auditors', [
        'as' => 'admin.coord.auditor.index',
        'uses' => 'AuditorController@index',
        'middleware' => 'can:coord.auditors.index'
    ]);
    $router->get('auditors/create', [
        'as' => 'admin.coord.auditor.create',
        'uses' => 'AuditorController@create',
        'middleware' => 'can:coord.auditors.create'
    ]);
    $router->post('auditors', [
        'as' => 'admin.coord.auditor.store',
        'uses' => 'AuditorController@store',
        'middleware' => 'can:coord.auditors.create'
    ]);
    $router->get('auditors/{auditor}/edit', [
        'as' => 'admin.coord.auditor.edit',
        'uses' => 'AuditorController@edit',
        'middleware' => 'can:coord.auditors.edit'
    ]);
    $router->put('auditors/{auditor}', [
        'as' => 'admin.coord.auditor.update',
        'uses' => 'AuditorController@update',
        'middleware' => 'can:coord.auditors.edit'
    ]);
    $router->delete('auditors/{auditor}', [
        'as' => 'admin.coord.auditor.destroy',
        'uses' => 'AuditorController@destroy',
        'middleware' => 'can:coord.auditors.destroy'
    ]);
// append

});
