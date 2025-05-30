<?php

return [
    'id' => 'smartclinicapp',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=smartclinicdb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];

