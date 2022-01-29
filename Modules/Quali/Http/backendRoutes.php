<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/quali'], function (Router $router) {
    $router->bind('qualifi', function ($id) {
        return app('Modules\Quali\Repositories\QualifiRepository')->find($id);
    });
    $router->get('qualifis', [
        'as' => 'admin.quali.qualifi.index',
        'uses' => 'QualifiController@index',
        'middleware' => 'can:quali.qualifis.index'
    ]);
    $router->get('qualifis/create', [
        'as' => 'admin.quali.qualifi.create',
        'uses' => 'QualifiController@create',
        'middleware' => 'can:quali.qualifis.create'
    ]);
    $router->post('qualifis', [
        'as' => 'admin.quali.qualifi.store',
        'uses' => 'QualifiController@store',
        'middleware' => 'can:quali.qualifis.create'
    ]);
    $router->get('qualifis/{qualifi}/edit', [
        'as' => 'admin.quali.qualifi.edit',
        'uses' => 'QualifiController@edit',
        'middleware' => 'can:quali.qualifis.edit'
    ]);
    $router->put('qualifis/{qualifi}', [
        'as' => 'admin.quali.qualifi.update',
        'uses' => 'QualifiController@update',
        'middleware' => 'can:quali.qualifis.edit'
    ]);
    $router->delete('qualifis/{qualifi}', [
        'as' => 'admin.quali.qualifi.destroy',
        'uses' => 'QualifiController@destroy',
        'middleware' => 'can:quali.qualifis.destroy'
    ]);
// append

});
