<?php

return [

    /*
    |--------------------------------------------------------------------------
    | LaraCMS menu
    |--------------------------------------------------------------------------
    |
    | Contains an array with LaraCMS menu points.
    |
    */
    'menu' => [
        [
            'icon' => '<i class="nc-icon nc-bank"></i>',
            'translation_key' => 'laracms::admin.menu.dashboard',
            'url' => 'laracms.dashboard'
        ],
        [
            'icon' => '<i class="nc-icon nc-circle-10"></i>',
            'translation_key' => 'laracms::admin.menu.users',
            'url' => 'laracms.users'
        ],
        [
            'icon' => '<i class="nc-icon nc-ruler-pencil"></i>',
            'translation_key' => 'laracms::admin.menu.content',
            'url' => 'laracms.content'
        ],
        [
            'icon' => '<i class="nc-icon nc-book-bookmark"></i>',
            'translation_key' => 'laracms::admin.menu.pages',
            'url' => 'laracms.pages'
        ],
//        [
//            'icon' => '<i class="nc-icon nc-book-bookmark"></i>',
//            'translation_key' => 'laracms::admin.menu.pages',
//            'url' => [
//                [
//                    'translation_key' => 'laracms::admin.menu.users',
//                    'url' => 'laracms.users'
//                ],
//                [
//                    'translation_key' => 'laracms::admin.menu.content',
//                    'url' => 'laracms.content'
//                ],
//                [
//                    'icon' => '<i class="nc-icon nc-book-bookmark"></i>',
//                    'translation_key' => 'laracms::admin.menu.pages',
//                    'url' => 'laracms.pages'
//                ],
//            ]
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | LaraCMS admin prefix
    |--------------------------------------------------------------------------
    |
    | The LaraCMS base route
    |
    | Default: "laracms"
    |
    */
    'prefix' => env('LARACMS_PREFIX', 'laracms'),

    /*
    |--------------------------------------------------------------------------
    | LaraCMS admin domain
    |--------------------------------------------------------------------------
    |
    | If specified, then LaraCMS admin panel will be accessible only from it
    |
    */
    'domain' => env('LARACMS_DOMAIN', ''),
];