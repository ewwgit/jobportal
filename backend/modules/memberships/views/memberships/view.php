<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memberships */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="memberships-view">

	

	<p>
        <?= Html::a('Update', ['update', 'id' => $model->mem_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mem_id], [
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
            'mem_id',
            'name',
            'description:ntext',
            /* 'duration', */
            'cost',
        	'currency',
            'type',
            'num_of_jobs_posting',
            'status',
            'createdDate',
            'updatedDate',
            'createdBy',
            'updatedBy',
        ],
    ]) ?>

</div>
