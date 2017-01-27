<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */

$this->title = 'Update Employees List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-list-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
