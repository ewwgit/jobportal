<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolesCategory */

$this->title = 'Update Roles Category: ' . $model->roleId;
$this->params['breadcrumbs'][] = ['label' => 'Roles Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->roleId, 'url' => ['view', 'id' => $model->roleId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div
	class="roles-category-update">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
