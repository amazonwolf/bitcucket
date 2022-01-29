<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/audits'], function (Router $router) {
    $router->bind('audit', function ($id) {
        return app('Modules\Audits\Repositories\AuditRepository')->find($id);
    });
    $router->get('audits', [
        'as' => 'admin.audits.audit.index',
        'uses' => 'AuditController@index',
        'middleware' => 'can:audits.audits.index'
    ]);
    $router->get('audits/create', [
        'as' => 'admin.audits.audit.create',
        'uses' => 'AuditController@create',
        'middleware' => 'can:audits.audits.create'
    ]);
    $router->post('audits', [
        'as' => 'admin.audits.audit.store',
        'uses' => 'AuditController@store',
        'middleware' => 'can:audits.audits.create'
    ]);
    $router->get('audits/{audit}/edit', [
        'as' => 'admin.audits.audit.edit',
        'uses' => 'AuditController@edit',
        'middleware' => 'can:audits.audits.edit'
    ]);
    $router->put('audits/{audit}', [
        'as' => 'admin.audits.audit.update',
        'uses' => 'AuditController@update',
        'middleware' => 'can:audits.audits.edit'
    ]);
    $router->delete('audits/{audit}', [
        'as' => 'admin.audits.audit.destroy',
        'uses' => 'AuditController@destroy',
        'middleware' => 'can:audits.audits.destroy'
    ]);
// append

});
