<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'layout'=>'main.twig',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
         'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'globals' => [
                        'html' => ['class' => '\yii\helpers\Html'],
                    ],
                    'uses' => ['yii\bootstrap'],
                ],
                // ...
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hdy87dedye!434bdueydededyeptor9403493aa445oreo#eiduuwiewi--',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '/',
            'rules' => [
                [
                    'pattern' => 'news/<page:\d+>',
                    'route' => 'news/index',
                    'defaults' => ['page' => '1']
                ],
                [
                    'pattern' => 'articles/<page:\d+>',
                    'route' => 'articles/index',
                    'defaults' => ['page' => '1']
                ],
                '<controller:[\w\-]+>/<id:[\d]+>'=>'<controller>/index',
                '<controller:[\w]+>/<action:[\w]+>' => '<controller>/<action>',
                '<controller:[\w\-]+>/<time:now|past>'=>'<controller>/index',
                // не работает с добавленем параметра id в роутинг '<controller:\w+>/<action:\.+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:[\d]+>'=>'<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<time:[\w\-]+>'=>'<controller>/<action>'
                // '<controller:[\w\-]+>/<action:[\w\-]+>/<id:[\d]+>/<start_dt:[\w\s\W]+>/<tn_name:[\w\s\W]+>/<max_client_count:[\d]+>'=>'<controller>/<action>'
            ],
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/auth' => 'auth.php',
                        'app/about_us' => 'about_us.php',
                        'app/base_err' => 'base_err.php',
                        'app/math' => 'math.php'
                    ]
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-EN',
                    'basePath' => '@app/messages'
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
