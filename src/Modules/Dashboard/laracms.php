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
            'icon' => '<i class="ti-layout"></i>',
            'translation_key' => 'laracms::admin.menu.dashboard',
            'url' => 'laracms.dashboard'
        ],
        [
            'icon' => '<i class="ti-user"></i>',
            'translation_key' => 'laracms::admin.menu.users',
            'url' => 'laracms.users'
        ],
        [
            'icon' => '<i class="ti-pencil"></i>',
            'translation_key' => 'laracms::admin.menu.content',
            'url' => 'laracms.content'
        ],
        [
            'icon' => '<i class="ti-book"></i>',
            'translation_key' => 'laracms::admin.menu.pages',
            'url' => 'laracms.pages'
        ],
    ]
];