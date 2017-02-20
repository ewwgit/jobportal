<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Designation */

$this->title = $model->designation_id;
$this->params['breadcrumbs'][] = ['label' => 'Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->designation_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->designation_id], [
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
            'designation_id',
            'name',
            'description',
            'status',
        		[
        		'attribute'=>'updatedDate',
        		'label' => 'Updated Date',
        		'format' =>  ['date', 'php:m/d/Y H:i:s'],
        		
        		],
        		[
        		'attribute'=>'createdDate',
        		'label' => 'Created Date',
        		'format' =>  ['date', 'php:m/d/Y H:i:s'],
        		
        		],
        		'createdBy',
        		'updatedBy',
        ],
    ]) ?>

</div>
