<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memberships */

$this->title = 'Update Memberships: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->mem_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div
	class="memberships-update">

	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
