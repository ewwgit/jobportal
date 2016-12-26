<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */

$this->title = 'Update Employers List: ' . $model->employerid;
$this->params['breadcrumbs'][] = ['label' => 'Employers Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employerid, 'url' => ['view', 'id' => $model->employerid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employers-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
