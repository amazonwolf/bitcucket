<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/asses'], function (Router $router) {
    $router->bind('assesment', function ($id) {
        return app('Modules\Asses\Repositories\AssesmentRepository')->find($id);
    });
    $router->get('assesments', [
        'as' => 'admin.asses.assesment.index',
        'uses' => 'AssesmentController@index',
        'middleware' => 'can:asses.assesments.index'
    ]);
    $router->get('assesments/create', [
        'as' => 'admin.asses.assesment.create',
        'uses' => 'AssesmentController@create',
        'middleware' => 'can:asses.assesments.create'
    ]);
    $router->post('assesments', [
        'as' => 'admin.asses.assesment.store',
        'uses' => 'AssesmentController@store',
        'middleware' => 'can:asses.assesments.create'
    ]);
    $router->get('assesments/{assesment}/edit', [
        'as' => 'admin.asses.assesment.edit',
        'uses' => 'AssesmentController@edit',
        'middleware' => 'can:asses.assesments.edit'
    ]);
    $router->put('assesments/{assesment}', [
        'as' => 'admin.asses.assesment.update',
        'uses' => 'AssesmentController@update',
        'middleware' => 'can:asses.assesments.edit'
    ]);
    $router->delete('assesments/{assesment}', [
        'as' => 'admin.asses.assesment.destroy',
        'uses' => 'AssesmentController@destroy',
        'middleware' => 'can:asses.assesments.destroy'
    ]);
// append

});
