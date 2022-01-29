<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/certi'], function (Router $router) {
    $router->bind('certificate', function ($id) {
        return app('Modules\Certi\Repositories\CertificateRepository')->find($id);
    });
    $router->get('certificates', [
        'as' => 'admin.certi.certificate.index',
        'uses' => 'CertificateController@index',
        'middleware' => 'can:certi.certificates.index'
    ]);
    $router->get('certificates/create', [
        'as' => 'admin.certi.certificate.create',
        'uses' => 'CertificateController@create',
        'middleware' => 'can:certi.certificates.create'
    ]);
    $router->post('certificates', [
        'as' => 'admin.certi.certificate.store',
        'uses' => 'CertificateController@store',
        'middleware' => 'can:certi.certificates.create'
    ]);
    $router->get('certificates/{certificate}/edit', [
        'as' => 'admin.certi.certificate.edit',
        'uses' => 'CertificateController@edit',
        'middleware' => 'can:certi.certificates.edit'
    ]);
    $router->put('certificates/{certificate}', [
        'as' => 'admin.certi.certificate.update',
        'uses' => 'CertificateController@update',
        'middleware' => 'can:certi.certificates.edit'
    ]);
    $router->delete('certificates/{certificate}', [
        'as' => 'admin.certi.certificate.destroy',
        'uses' => 'CertificateController@destroy',
        'middleware' => 'can:certi.certificates.destroy'
    ]);
// append

});
