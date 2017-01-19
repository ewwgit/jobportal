<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
$searchUrl = Yii::$app->urlManager->createUrl(['employees?EmployeeJobsearch%5Brolecategory%5D='.$model['role_name']]);
?>
<style>
.list-view {
	min-height: 300px;
}
</style>
<div class="row">
<div class="col-md-3">
<li> <a href="<?= $searchUrl; ?>"> <?=$model['role_name'] ?> Jobs</a></li>
</div>
</div>
