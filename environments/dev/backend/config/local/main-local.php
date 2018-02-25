<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
            'defaultRoles' => ['guest'],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'forceCopy' => false,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@kordar/ace/assets/ace/assets',
                    'js' => [
                        ['js/jquery-2.1.4.min.js', 'condition'=>'!IE'],
                        ['js/jquery-1.11.3.min.js', 'condition'=>'IE'],
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@kordar/ace/assets/ace/assets',
                    'css' => [
                        'css/bootstrap.min.css'
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => '@kordar/ace/assets/ace/assets',
                    'js' => [
                        'js/bootstrap.min.js'
                    ]
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'ace/default/error',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '',
            'port' => 6379,
            'database' => 0,
        ],
        'session' => [
            'class'=>'yii\redis\Session',
            'redis' => [
                'class' => 'yii\redis\Connection',
                'hostname' => '',
                'port' => 6379,
                'database' => 1,
            ],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
