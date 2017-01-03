<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
		'defaultRoute' => 'site/index',
		//'defaultRoute' => 'user/index',
		'modules' => [
				'employercompany' => [
						'class' => 'app\modules\employercompany\employercompany',
				],
				
		],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
       /*  'request' => [
            'csrfParam' => '_csrf-frontend',
        ], */
    		'authClientCollection' => [
    				'class' => 'yii\authclient\Collection',
    				'clients' => [
    						'google' => [
    								'class' => 'yii\authclient\clients\Google',
    								'clientId' => '604006204304-vjl6qpcvb32fb1dsufoh1sjujpijdvfq.apps.googleusercontent.com',
    								'clientSecret' => '7NAsLa52gWZNomzDvVSGuRg9',
    						],
    						'facebook' => [
    								'class' => 'yii\authclient\clients\Facebook',
    								'clientId' => '1159301224119499',
    								'clientSecret' => '63f5de378875b955ab7d146cf22ad0f2',
    								'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
    						],
    						// etc.
    				],
    		],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 24 * 30],
            'timeout' => 3600 * 24 * 30,
            'useCookies' => true,
			'name' => '_frontendSessionId', // unique for frontend
			'savePath' => __DIR__ . '/../runtime', // a temporary folder on frontend
        ],
				'emplyoee' => [
						'class' => 'common\components\Emplyoee',
						
				],
				'employer' => [
						'class' => 'common\components\Employer',
				
				],
    		
    		'request' => [
    				'baseUrl' => $baseUrl,
    				'enableCsrfValidation' => false,
    		],
    		'urlManager' => [
    				'baseUrl' => $baseUrl,
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'rules' => [
    		
    				]
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
