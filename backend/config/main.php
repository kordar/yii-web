<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/local/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/local/params-local.php'
);

return [

    'id' => 'app-backend',
    'language' => 'zh-CN',

    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

    'modules' => [
        'ace' => [
            'class' => 'kordar\ace\Module',
        ],
        'rbac' => [
            'class' => 'kordar\ace\modules\rbac\Module',
        ],
    ],

    'defaultRoute' => 'ace/default/index',
    'layoutPath' => '@vendor/kordar/yii2-ace/views/layouts',  # 布局文件
    'layout' => 'main',

    'components' => [

        # 用户登录认证管理
        'user' => [
            'identityClass' => 'kordar\ace\models\admin\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '__ace_identity', 'httpOnly' => true],
            'idParam' => '__ace_admin',
            'loginUrl' => ['/ace/auth/login'],
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

        # 语言包
        'i18n' => [
            'translations' => [
                'ace*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@kordar/ace/web/messages',
                    // 'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'ace' => 'ace.php',
                        'ace.sidebar' => 'ace.sidebar.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'upload' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@kordar/upload/messages',
                ],
            ],
        ],

    ],
    'params' => $params,
];
