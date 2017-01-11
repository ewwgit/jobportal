<?php

namespace app\modules\company;
use Yii;
class company extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\company\controllers';

    public function init()
    {
        parent::init();
        //Yii::$app->errorHandler->errorAction='employercompany/employercompany/error';
        // custom initialization code goes here
    }
    
}
