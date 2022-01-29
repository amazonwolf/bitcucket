<?php

return [
    'clients.clients' => [
        'index' => 'clients::clients.list resource',
        'create' => 'clients::clients.create resource',
        'edit' => 'clients::clients.edit resource',
        'destroy' => 'clients::clients.destroy resource',
    ],
    'clients.offers' => [
        'index' => 'clients::offers.list resource',
        'create' => 'clients::offers.create resource',
        'edit' => 'clients::offers.edit resource',
        'destroy' => 'clients::offers.destroy resource',
    ],
// append


];
