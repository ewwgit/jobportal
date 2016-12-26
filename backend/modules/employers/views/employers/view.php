<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */

$this->title = $model->employerid;
$this->params['breadcrumbs'][] = ['label' => 'Employers Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employers-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'employername',
            'employertype',
            'designation',
            'userid',
        ],
    ]) ?>

</div>
