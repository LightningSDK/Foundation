<?php

return [
    'compiler' => [
        'js' => [
            'macdabby/lightning-foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/js/foundation.min.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['Lightning', 'macdabby/lightning-jquery']
                ],
            ],
        ],
        'css' => [
            'macdabby/lightning-foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/css/foundation.css' => 'lightning.css',
                'vendor/zurb/foundation/dist/css/foundation-float.css' => 'lightning.css',
            ],
        ],
    ],
    'template' => [
        'default' => ['document', 'macdabby/lightning-foundation'],
    ],
];
