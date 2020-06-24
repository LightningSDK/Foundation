<?php

return [
    'compiler' => [
        'js' => [
            'lightningsdk/foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/js/foundation.min.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['lightningsdk/jquery']
                ],
                'js/default-hack.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['lightningsdk/jquery']
                ],
                'js/init.js' => [
                    'dest' => 'lightning.min.js',
                    'requires_module' => ['lightningsdk/jquery', 'lightningsdk/core']
                ],
            ],
        ],
        'css' => [
            'lightningsdk/foundation' => [
                // Source file => Dest file
                'vendor/zurb/foundation/dist/css/foundation.css' => 'lightning.css',
                'vendor/zurb/foundation/dist/css/foundation-float.css' => 'lightning.css',
                'css/menu-fix.scss' => 'lightning.css',
            ],
        ],
        'sass' => [
            'includes' => [
                'foundation' => 'vendor/zurb/foundation/scss',
            ],
        ],
        'copy' => [
            'lightningsdk/foundation' => [
                'js/ckeditor-plugins/**' => 'js/ckeditor/plugins',
            ],
        ],
    ],
    'template' => [
        'default' => ['document', 'lightningsdk/foundation'],
    ],
];
