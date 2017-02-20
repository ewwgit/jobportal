<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */

$this->title = 'Update Employees List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-list-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
