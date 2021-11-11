<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7c7befb4b392d36a11486ea82a6ebec6854e6469',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'site'=>'site/index',
                'site/query1' => 'site/query1',
                'site/query2' => 'site/query2',
                'site/query3' => 'site/query3',
                'site/query4' => 'site/query4',
                'site/query5' => 'site/query5',
                'site/query6' => 'site/query6',
                'site/query7' => 'site/query7',
                'site/query8' => 'site/query8',
                'site/query9' => 'site/query9',
                'site/query10' => 'site/query10',
                'site/query11' => 'site/query11',
                'site/query12' => 'site/query12',
                'site/query13' => 'site/query13',
                'site/queries' => 'site/queries',

                'admin/index' => 'admin/default/index',
                'admin/brigades/index' => 'admin/brigades/index',
                'admin/material/index' => 'admin/material/index',
                'admin/sotrudniki/index' => 'admin/sotrudniki/index',
                'admin/dolzhnosti/index' => 'admin/dolzhnosti/index',
                'admin/graphic-objects/index' => 'admin/graphic-objects/index',
                'admin/stroi-uprav/index' => 'admin/stroi-uprav/index',
                'admin/tehnika/index' => 'admin/tehnika/index',
                'admin/zakazchiki/index' => 'admin/zakazchiki/index',
                'admin/objects/index' => 'admin/objects/index',
            ],
        ],*/
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
