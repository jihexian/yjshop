<?php
return [
     'language'=>'zh-CN',//设置语言
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'wechat' => [
        'class' => 'maxwen\easywechat\Wechat', //引入esaywechat扩展
        // 'userOptions' => []  # user identity class params
        // 'sessionParam' => '' # wechat user info will be stored in session under this key
        // 'returnUrlParam' => '' # returnUrl param stored in session
      ],
      'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
     
       // 'suffix' => '.html',  // 伪后缀
        'rules'=>[
               'article/<id:\d+>' => 'article/view', // 文章详情 
               'articles/<country_id:\d+>' => 'article/index', // 文章列表
        ],
      ],

    'i18n' => [
        'translations' => [
            '*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                'sourceLanguage' => 'en',
                'fileMap' => [
                    //'main' => 'main.php',
                ],
            ],
        ],
    ],
    ],
];
