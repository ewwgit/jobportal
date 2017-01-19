<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Memberships */
/* @var $form yii\widgets\ActiveForm */
?>

<div
	class="memberships-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

   

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'currency')->dropDownList([ 'INR' => 'INR', 'USD' => 'USD', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Monthly' => 'Monthly', 'Yearly' => 'Yearly', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'num_of_jobs_posting')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
