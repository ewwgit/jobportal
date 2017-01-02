<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Specializations */

$this->title = 'Update Specializations: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Specializations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->specialization_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div
	class="specializations-update">

	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
