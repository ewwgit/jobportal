<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployerslistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employers-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employerid') ?>

    <?= $form->field($model, 'first_name') ?>
      <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'mobilenumber') ?>

    <?= $form->field($model, 'dateofbirth') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'profileimage') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'skills') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
