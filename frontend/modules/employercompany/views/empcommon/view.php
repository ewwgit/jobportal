<?php
use kartik\social\Module;
use kartik\social\FacebookPlugin;
use yii\helpers\Url;
$social = Yii::$app->getModule('social');
$callback = Url::toRoute(['/employercompany/empcommon/validate-fb'], true); // or any absolute url you want to redirect
echo $social->getFbLoginLink($callback, ['class'=>'btn btn-primary']);

echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => []]);