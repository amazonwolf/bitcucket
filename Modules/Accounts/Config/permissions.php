<?php

return [
    'accounts.pendings' => [
        'index' => 'accounts::pendings.list resource',
        'create' => 'accounts::pendings.create resource',
        'edit' => 'accounts::pendings.edit resource',
        'destroy' => 'accounts::pendings.destroy resource',
    ],
    'accounts.approveds' => [
        'index' => 'accounts::approveds.list resource',
        'create' => 'accounts::approveds.create resource',
        'edit' => 'accounts::approveds.edit resource',
        'destroy' => 'accounts::approveds.destroy resource',
    ],
// append


];
