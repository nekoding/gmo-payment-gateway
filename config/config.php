<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'is_sandbox'    => env('GMO_API_SANDBOX_MODE', true),
    'creds'         => [
        'site_id'   => env('GMO_SITE_ID'),
        'site_pass' => env('GMO_SITE_PASS'),
        'shop_id'   => env('GMO_SHOP_ID'),
        'shop_pass' => env('GMO_SHOP_PASS')
    ],
    'secure'   => [
        '3dversion'   => env('GMO_3DS_VERSION')
    ]
];