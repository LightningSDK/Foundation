<?php

return [
    'compiler' => [
        'js' => [
            'lightningsdk/foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/js/foundation.min.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['lightningsdk/core', 'lightningsdk/jquery']
                ],
            ],
        ],
        'css' => [
            'lightningsdk/foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/css/foundation.css' => 'lightning.css',
                'vendor/zurb/foundation/dist/css/foundation-float.css' => 'lightning.css',
            ],
        ],
        'sass' => [
            'vendor/zurb/foundation/scss',
        ],
    ],
    'template' => [
        'default' => ['document', 'lightningsdk/foundation'],
    ],
];
