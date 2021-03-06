<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'defaultRoute' => 'site/login',
    'language'   => 'ru-RU',
    'bootstrap'  => ['log'],
    'components' => [
        'assetManager' => [
            'class'           => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'bundles'         => [
                'romdim\bootstrap\material\BootMaterialCssAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/ripples.min.css' : 'css/ripples.min.css',
                        YII_ENV_DEV ? 'css/material.css' : 'css/material.min.css',
                    ],
                ],
                'romdim\bootstrap\material\BootMaterialJsAsset'  => [
                    'js' => [
                        YII_ENV_DEV ? 'js/ripples.js' : 'js/ripples.min.js',
                        YII_ENV_DEV ? 'js/material.js' : 'js/material.min.js',
                    ],
                ],
            ],
        ],
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'taReVS53xuYc8YYteyNU0HgQeRe_WjKO',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => require(__DIR__ . '/db.php'),
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
            ],
        ],
    ],
    'modules'    => [
        'gii' => [
            'class'      => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1'],
        ],
    ],
    'params'     => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
