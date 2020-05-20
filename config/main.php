<?php
return [
    'title' => 'Мой магазин',
    'defaultControllerName'=>'good',

    'components'=>[
        'db'=>[
            'class' => \App\services\DB::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'dbname' => 'gbphp',
                'charset' => 'UTF8',
                'username' => 'root',
                'password' => ''
            ]
        ],
        'twigRenderer' => [
            'class' => \App\services\renderers\TwigRender::class
        ],
        'request' => [
            'class' => \App\services\Request::class
        ],
        'GoodRepository' => [
            'class' => \App\repositories\GoodRepository::class
        ],
        'UserRepository' => [
            'class' => \App\repositories\UserRepository::class
        ],
        'BasketServices' => [
            'class' => \App\services\BasketServices::class
        ]
    ]
];