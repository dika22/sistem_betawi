<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern'=>'kesenian',
                    'route'=>'post/index',
                    'defaults'=>['type'=>'kesenian','id'=>1]
                ],
                [   
                    'pattern'=>'kesenian/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'kesenian']
                ],
                [
                    'pattern'=>'tokoh',
                    'route'=>'post/index',
                    'defaults'=>['type'=>'tokoh','id'=>2]
                ],
                [   
                    'pattern'=>'tokoh/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'tokoh']
                ],
                [
                    'pattern'=>'adat',
                    'route'=>'post/index',
                    'defaults'=>['type'=>'adat','id'=>3]
                ],
                [   
                    'pattern'=>'adat/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'adat']
                ],
                [
                    'pattern'=>'makanan',
                    'route'=>'post/makanan',
                    'defaults'=>['type'=>'makanan','id'=>4]
                ],
                [   
                    'pattern'=>'makanan/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'makanan']
                ],
                [
                    'pattern'=>'minuman',
                    'route'=>'post/index',
                    'defaults'=>['type'=>'minuman','id'=>5]
                ],
                [   
                    'pattern'=>'minuman/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'minuman']
                ],
                [
                    'pattern'=>'permaianan',
                    'route'=>'post/permaianan',
                    'defaults'=>['type'=>'permaianan','id'=>6]
                ],
                [   
                    'pattern'=>'permaianan/<t:[\w\-]+>/<d:[\w\-]+>',
                    'route'=>'post/detail',
                    'defaults'=>['type'=>'permaianan']
                ]
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/watcher/views'],
                'baseUrl' => '@web/themes/watcher/views',
            ],
        ],

    ],
    'params' => $params,
];
