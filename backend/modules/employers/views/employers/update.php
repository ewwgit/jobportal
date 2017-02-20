<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */

$this->title = 'Update Employers List: ' . $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Employers Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['view', 'userid' => $model->userid ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-list-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
