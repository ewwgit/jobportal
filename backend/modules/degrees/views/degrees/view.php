<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Degrees */

$this->title = $model->degree_id;
$this->params['breadcrumbs'][] = ['label' => 'Degrees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="degrees-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->degree_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->degree_id], [
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
            'degree_id',
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
        		//'createdDate',
        		//'updatedDate',
        		'createdBy',
        		'updatedBy',
        ],
    ]) ?>

</div>
