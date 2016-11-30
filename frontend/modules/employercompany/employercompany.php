<?php

namespace app\modules\employercompany;
use Yii;
class employercompany extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\employercompany\controllers';

    public function init()
    {
        parent::init();
        //Yii::$app->errorHandler->errorAction='employercompany/employercompany/error';
        // custom initialization code goes here
    }
    
}
