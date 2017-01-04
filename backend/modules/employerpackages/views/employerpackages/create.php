<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmployerPackages */

$this->title = 'Create Employer Packages';
$this->params['breadcrumbs'][] = ['label' => 'Employer Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="employer-packages-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
