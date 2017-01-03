<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'bootstrap' => ['log'],
    'modules' => [
    		'employees' => [
    				'class' => 'app\modules\employees\employees',
    		],
    		'employers' => [
    				'class' => 'app\modules\employers\employers',
    		],
    		'degrees' => [
    				'class' => 'app\modules\degrees\degrees',
    		],
    		'designation' => [
    				'class' => 'app\modules\designation\designation',
    		],
    		'specializations' => [
    				'class' => 'app\modules\specializations\specializations',
    				 
    		],
    		'memberships' => [
    				'class' => 'app\modules\memberships\memberships',
    		],
    		
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        		'identityCookie' => [
        				'name' => '_backendUser', // unique for backend
        				'path' => '/advanced/backend/web' // correct path for backend app.
        		],
        ],
        'session' => [
    				'class' => 'yii\web\Session',
    				'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 24 * 30],
    				'timeout' => 3600 * 24 * 30,
    				'useCookies' => true,
    				'name' => '_backendUser', // unique for frontend
    				'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
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
    		
    		'view' => [
    				'theme' => [
    						'pathMap' => [
    								'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
    						],
    				],
    		],
    		'db' => [
    				'class' => '\yii\db\Connection',
    				'dsn' => 'mysql:host=localhost;dbname=jobportal',
    				'username' => 'root',
    				'password' => '',
    				'charset' => 'utf8'
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
