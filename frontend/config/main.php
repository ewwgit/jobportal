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
		//'defaultRoute' => 'user/index',
		'modules' => [
				'employercompany' => [
						'class' => 'app\modules\employercompany\employercompany',
				],
				
		],
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
//     		'user' => [
//     				'identityClass' => 'common\models\User',
//     				'enableAutoLogin' => true ,
//     				'identityCookie' => [
//     						'name' => '_frontendUser', // unique for frontend
//     						'path'=>'/frontend/web'  // correct path for the frontend app.
//     				]
//     		],
//     		'session' => [
//     				'class' => 'yii\web\Session',
//     				'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 24 * 30],
//     				'timeout' => 3600 * 24 * 30,
//     				'useCookies' => true,
//     				'name' => '_frontendSessionId', // unique for frontend
//     				'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
//     		],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
