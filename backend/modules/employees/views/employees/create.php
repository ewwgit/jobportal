<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */

$this->title = 'Create Employees List';
$this->params['breadcrumbs'][] = ['label' => 'Employees Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-list-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
