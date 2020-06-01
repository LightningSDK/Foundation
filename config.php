<?php

return [
    'compiler' => [
        'js' => [
            'Foundation6' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/js/foundation.min.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['Lightning', 'macdabby/lightning-jquery']
                ],
            ],
        ],
        'css' => [
            'Foundation6' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/css/foundation.css' => 'lightning.css',
                'vendor/zurb/foundation/dist/css/foundation-float.css' => 'lightning.css',
            ],
        ],
    ],
    'template' => [
        'default' => ['document', 'Foundation6'],
    ],
];
