<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employers Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employers-list-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employerid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employerid], [
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
            'employerid',
            'name',
            'mobilenumber',
            'dateofbirth',
            'gender:ntext',
            'designation',
            'address:ntext',
            'userid',
            'profileimage',
            'create_date',
            'updated_date',
            'skills',
        ],
    ]) ?>

</div>
