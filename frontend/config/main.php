<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','plugins'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'plugins' => [
            'class' => lo\plugins\components\PluginsManager::class,
            'appId' => 1, // lo\plugins\BasePlugin::APP_FRONTEND,
            // by default
            'enablePlugins' => true,
            'shortcodesParse' => true,
            'shortcodesIgnoreBlocks' => [
            '<pre[^>]*>' => '<\/pre>',
            //'<div class="content[^>]*>' => '<\/div>',
            ]
        ],
        'view' => [
            'class' => lo\plugins\components\View::class,
        ]
    ],
    'params' => $params,
];
