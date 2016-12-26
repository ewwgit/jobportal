<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employers-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employertype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
