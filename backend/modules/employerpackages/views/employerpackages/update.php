<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployerPackages */

$this->title = 'Update Employer Packages: ' . $model->employer_pid;
$this->params['breadcrumbs'][] = ['label' => 'Employer Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employer_pid, 'url' => ['view', 'id' => $model->employer_pid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div
	class="employer-packages-update">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
