<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            
                  <?= $form->field($model, 'username')->textInput(['value' => $model->username]) ?>
                  <?= $form->field($model, 'name')->textInput(['value' => $model->name]) ?>  
                  <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'],['value' => $model->gender] )?>                
                  <?= $form->field($model, 'designation')->dropDownList(['softwaredeveloper' => 'softwaredevelopper','systemengineer' => 'systemengineer','tester' =>'tester','accountant' => 'accountant','designer' => 'designer'],['prompt'=>'select designation'],['value' => $model->designation] ) ?>   
                  <?= $form->field($model, 'address')->textArea(['value' => $model->address]) ?> 
                   <?= $form->field($model, 'dateofbirth')->textInput(['type'=>'date'],['value' => $model->dateofbirth]) ?>
                    <?= $form->field($model, 'mobilenumber')->textInput(['value' => $model->mobilenumber]) ?>
                     
               
<div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>