<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RolesCategory */

$this->title = $model->roleId;
$this->params['breadcrumbs'][] = ['label' => 'Roles Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="roles-category-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
        <?= Html::a('Update', ['update', 'id' => $model->roleId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->roleId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'roleId',
            'role_name',
            'status',
            'description:ntext',
            'createdDate',
            'updatedDate',
        ],
    ]) ?>

</div>
