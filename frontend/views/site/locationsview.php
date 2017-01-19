<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
$searchUrl = Yii::$app->urlManager->createUrl(['employees?EmployeeJobsearch%5Bjob_location%5D%5B%5D='.$model['location']]);
?>

<li> <a href="<?= $searchUrl; ?>">Jobs in <?=$model['location'] ?></a></li>