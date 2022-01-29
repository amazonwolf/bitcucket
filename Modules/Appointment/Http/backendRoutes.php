<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/appointment'], function (Router $router) {
    $router->bind('appoint', function ($id) {
        return app('Modules\Appointment\Repositories\AppointRepository')->find($id);
    });
    $router->get('appoints', [
        'as' => 'admin.appointment.appoint.index',
        'uses' => 'AppointController@index',
        'middleware' => 'can:appointment.appoints.index'
    ]);
    $router->get('appoints/create', [
        'as' => 'admin.appointment.appoint.create',
        'uses' => 'AppointController@create',
        'middleware' => 'can:appointment.appoints.create'
    ]);
    $router->post('appoints', [
        'as' => 'admin.appointment.appoint.store',
        'uses' => 'AppointController@store',
        'middleware' => 'can:appointment.appoints.create'
    ]);
    $router->get('appoints/{appoint}/edit', [
        'as' => 'admin.appointment.appoint.edit',
        'uses' => 'AppointController@edit',
        'middleware' => 'can:appointment.appoints.edit'
    ]);
    $router->put('appoints/{appoint}', [
        'as' => 'admin.appointment.appoint.update',
        'uses' => 'AppointController@update',
        'middleware' => 'can:appointment.appoints.edit'
    ]);
    $router->delete('appoints/{appoint}', [
        'as' => 'admin.appointment.appoint.destroy',
        'uses' => 'AppointController@destroy',
        'middleware' => 'can:appointment.appoints.destroy'
    ]);
// append

});
