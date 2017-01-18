<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employers-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'mobilenumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateofbirth')->textInput() ?>

    <?= $form->field($model, 'gender')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'profileimage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'skills')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
