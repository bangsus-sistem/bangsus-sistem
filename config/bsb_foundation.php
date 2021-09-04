<?php

return [
    'http' => [
        'request' => [
            'feature' => [
                'model' => \App\Models\Auth\Feature::class,
            ],
            'widget' => [
                'model' => \App\Models\Auth\Widget::class,
            ],
            'report' => [
                'model' => \App\Models\Auth\Report::class,
            ],
        ],
    ],
    'macro' => [
        'register' => [
            'blueprints' => true,
            'rules' => true,
        ],
        'kernel' => \App\Macro\Kernel::class,
        'config' => [
            'rule' => [
                'prefix' => 'bsb',
            ],
        ],
    ],
    'observer' => [
        'kernel' => [
            \App\Observers\Kernel::class,
            \App\Observers\Kernel::class
        ],
    ],
];
