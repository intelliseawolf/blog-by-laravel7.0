<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Particles JS Settings
    |--------------------------------------------------------------------------
    */
    'particlesjs' => [
        'useCdn'    => env('PORTFOLIO_PARTICLESJS_USE_CDN', true),
        'cdn'       => env('PORTFOLIO_PARTICLESJS_CDN', 'https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Contact Info
    |--------------------------------------------------------------------------
    */
    'contact' => [
        'phone' => [
            'icon'      => env('PORTFOLIO_CONTACT_PHONE_ICON', 'fa-phone'),
            'string'    => env('PORTFOLIO_CONTACT_PHONE_STRING', null),
            'link'      => env('PORTFOLIO_CONTACT_PHONE_LINK', null),
        ],
        'email' => [
            'icon'      => env('PORTFOLIO_CONTACT_EMAIL_ICON', 'fa-envelope'),
            'string'    => env('PORTFOLIO_CONTACT_EMAIL_STRING', null),
            'link'      => env('PORTFOLIO_CONTACT_EMAIL_LINK', null),
        ],
        'time' => [
            'icon'      => env('PORTFOLIO_CONTACT_TIME_ICON', 'fa-clock-o'),
            'string'    => env('PORTFOLIO_CONTACT_TIME_STRING', null),
        ],
        'location' => [
            'icon'      => env('PORTFOLIO_CONTACT_LOCATION_ICON', 'fa-map-marker'),
            'string'    => env('PORTFOLIO_CONTACT_LOCATION_STRING', null),
        ],
    ],
];
