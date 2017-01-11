<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;
use kartik\mpdf\Pdf;
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
				'company' => [
						'class' => 'app\modules\company\company',
				],
				
				'social' => [
						// the module class
						'class' => 'kartik\social\Module',
				
						// the global settings for the Disqus widget
						'disqus' => [
								'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
						],
				
						// the global settings for the Facebook plugins widget
						'facebook' => [
								'appId' => '1159301224119499',
								'secret' => '63f5de378875b955ab7d146cf22ad0f2',
						],
				
						// the global settings for the Google+ Plugins widget
						'google' => [
								'clientId' => 'GOOGLE_API_CLIENT_ID',
								'pageId' => 'GOOGLE_PLUS_PAGE_ID',
								'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
						],
				
						// the global settings for the Google Analytics plugin widget
						'googleAnalytics' => [
								'id' => 'TRACKING_ID',
								'domain' => 'TRACKING_DOMAIN',
						],
				
						// the global settings for the Twitter plugin widget
						'twitter' => [
								'screenName' => 'TWITTER_SCREEN_NAME'
						],
				
						// the global settings for the GitHub plugin widget
						'github' => [
								'settings' => ['user' => 'GITHUB_USER', 'repo' => 'GITHUB_REPO']
						],
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
    						'twitter' => [
    								'class' => 'yii\authclient\clients\Twitter',
    								'attributeParams' => [
    										'include_email' => 'true'
    								],
    								'consumerKey' => '8LytYPZ2DBLow0O88NxqBnFcR',
    								'consumerSecret' => '5U7DOVkZmeLEQ8Rt4cM7XW68tw3os4Tl3n8JaFmNN2BZCC0wWC',
    						],
    						'linkedin' => [
    								'class' => 'yii\authclient\clients\LinkedIn',
    								'clientId' => '81b871j1q04ctq',
    								'clientSecret' => 'S9l855IaU2oI47AM',
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
    						'employees' => 'site/index',
    						'employees-viewprofile' => 'site/viewprofile',
    						'employees-profile-edit' => 'common/employee',
    						'employees-applied-jobs' => 'site/myjobs',
    						'<slug:>/employees-job-details-<id:\w+>' => 'site/jobdetails',
    						'employees-signup' => 'site/signup',
    						'employees-login' => 'site/login',
    						'employees-logout' => 'site/logout',
    						'employees-request-password-reset' => 'site/request-password-reset',
    						'employees-reset-assword' => 'site/reset-password',
    						
    						'employers' => 'employercompany/empsite/login',
    						'employers-signup' => 'employercompany/empsite/signup',
    						'employers-profile' => 'employercompany/empcommon/employercommonview',
    						'employers-edit-profile' => 'employercompany/empcommon/employer',
    						'employers-all-jobs' => 'employercompany/empcommon/jobpostingslist',
    						'employers-post-new-job' => 'employercompany/empcommon/create',
    						'employers-edit-job-<id:\w+>' => 'employercompany/empcommon/update',
    						'employers-job-details-<id:\w+>' => 'employercompany/empcommon/jobpostingsview',
    						'employers-job-applied-employees-<jid:\w+>-<status:\w+>' => 'employercompany/empcommon/employeeslist',
    						'employers-logout' => 'employercompany/empsite/logout',
    						'employers-request-password-reset' => 'employercompany/empsite/request-password-reset',
    						'employers-request-password-reset' => 'employercompany/empsite/reset-password',
    						'employers-browse-resume' => 'employercompany/empcommon/browseresumes',
    				]
    		],
    		'pdf' => [
    				'class' => Pdf::classname(),
    				'format' => Pdf::FORMAT_A4,
    				'orientation' => Pdf::ORIENT_PORTRAIT,
    				'destination' => Pdf::DEST_BROWSER,
    				// refer settings section for all configuration options
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
    		'socialShare' => [
    				'class' => bl\socialShare\SocialShare::className(),
    				'defaultIcons' => true,
    				'attributes' => [
    						'class' => 'social-btn'
    				],
    				'networks' => [
    						'facebook' => [
    								'class' => bl\socialShare\classes\Facebook::className(),
    								'label' => 'Facebook'
    						],
    						'twitter' => [
    								'class' => bl\socialShare\classes\Twitter::className(),
    								'label' => 'Twitter',
    								// custom option for Twitter class
    								'account' => 'twitterAccount'
    						],
    						'googlePlus' => [
    								'class' => bl\socialShare\classes\GooglePlus::className(),
    								'label' => 'Google+'
    						],
    						'gmail' => [
    								'class' => bl\socialShare\classes\Gmail::className(),
    								'label' => 'Gmail'
    						],
    						'pinterest' => [
    								'class' => bl\socialShare\classes\Pinterest::className(),
    								'label' => 'Pinterest'
    						],
    						'telegram' => [
    								'class' => bl\socialShare\classes\Telegram::className(),
    								'label' => 'Telegram'
    						],
    						/* 'vk' => [
    								'class' => bl\socialShare\classes\Vkontakte::className(),
    								'label' => 'vk'
    						], */
    						'linkedIn' => [
    								'class' => bl\socialShare\classes\LinkedIn::className(),
    								'label' => 'LinkedIn'
    						],
    						'whatsApp' => [
    								'class' => bl\socialShare\classes\mobile\WhatsApp::className(),
    								'label' => 'WhatsApp'
    						],
    						'viber' => [
    								'class' => bl\socialShare\classes\mobile\Viber::className(),
    								'label' => 'Viber'
    						],
    						// other social networks ...
    				]
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
