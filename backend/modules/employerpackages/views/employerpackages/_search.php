<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployerPackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div
	class="employer-packages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employer_pid') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'mem_id') ?>

    <?= $form->field($model, 'startDate') ?>

    <?= $form->field($model, 'endDate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
