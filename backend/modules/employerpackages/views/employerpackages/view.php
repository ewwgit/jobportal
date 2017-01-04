<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployerPackages */

$this->title = $model->employer_pid;
$this->params['breadcrumbs'][] = ['label' => 'Employer Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="employer-packages-view">

	

	<p>
        <?= Html::a('Update', ['update', 'id' => $model->employer_pid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employer_pid], [
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
           // 'employer_pid',
            'userId',
            'mem_id',
            'startDate',
            'endDate',
            'status',
            'createdDate',
        ],
    ]) ?>

</div>
