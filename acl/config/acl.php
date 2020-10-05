<?php

return [

    'role' => [
        'owner',
        'admin',
        'employee'],

    'permission_config' => [

        'Dashboard' => ['owner', 'admin', 'employee'],
        'Reports' => ['owner', 'employee'],
        'Configuration' => ['owner', 'admin'],

        'Home' => ['admin', 'employee'],
        'Account' => ['owner']

    ]
];

// Config::get('acl.premission_config');
